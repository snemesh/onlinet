<?php

namespace App\Helpers;

use App\Answer;
use App\Survey;
use App\SurveyQuestion;
use App\User;
use App\Result;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\View;
use Auth;

class SurveyClass {

    public static $ResponderName;
    public static $Survey;
    public static $SurveyID;
    public static $SurveyName;
    public static $ResponderTime;
    public static $PlanedTime;
    public static $ResultID;
    public static $lastUpdatedByResponder;
    public static $SurveyQuestionsAnswers;
    public static $Answers;
    public static $encodeLink;
    public static $currentUserId;
    public static $SurveyQuestion;


    public static function setup($id) {
        //init survey by link
        $data = explode(':',base64_decode($id));

        self::$currentUserId = Auth::user()->id;
        self::$SurveyName    = $data[0];
        self::$PlanedTime    = $data[1];
        self::$ResponderName = $data[2];
        self::$Survey = self::getSurvey($id);
        self::$SurveyID = self::$Survey->id;

        return true;
    }


    public static function saveUserAnswerToResult($request)
    {
        $Result = new Result();

        //Check that Survey exist
        if (self::$Survey != null){

            $Result->servey_id = self::$SurveyID;
        }

        // Checking if user put his answer
        if ( $request->answerforquestion != null ) {
            //Saving it to the Results table
            $Result->answer_id = $request->answerforquestion;
        }

        //Saving question Id to the table
        $Result->question_id = $request->question_id;

        //Saving Responder Name in Result table
        $Result->responder_name = self::$ResponderName;

        //Saving Planing Time in Result table
        $Result->plened_time = self::$PlanedTime;


        //Searching correct answer in Question Table
        $rightAnswer =  self::findRightAnswerForQuestion($request->question_id);

        //Search users answer in teble
        $usersAnswer = Answer::find($request->answerforquestion);

        //checking, if user answer is correct?
        if($usersAnswer!=null and $usersAnswer->users_anwser == $rightAnswer){

            //writing flag Correct for this question on database
            $Result->result = "Correct";

        }   else {

            //writing flag Incorrect for this question on database
            $Result->result = "Incorrect";

        }

        $Result->status = "Incomplite";
        $Result->save();
        self::$ResultID = $Result->id;
        //dump(self::$ResultID);
        return $Result->id;

    }

    public static function findRightAnswerForQuestion($questionId){

        $rightAnswer = Question::find($questionId);
        return $rightAnswer->answer;

    }

    public static function getSurvey ($id) {

        $res = Survey::where('name',self::$SurveyName)->first();

        if ($res == null){

            $message1 = 'The test not found';
            $message2 = 'Contact to administrator';

            $content = View::make('message')->with('message1',$message1)->with('message2',$message2);
            echo $content->render();
            exit();

        }

        return $res;

    }


    public static function showMessage($getmessage1, $getmessage2) {

        $message1 = $getmessage1;
        $message2 = $getmessage2;
        $res =  view::make('message')->with('message1',$message1)->with('message2',$message2);
        echo $res->render();
        exit();

    }

    public static function init($id){

        if(self::setup($id)!= true){

            $message1 = "Something wrong with Servey";
            $message2 = "Please contact to system administrator";
            self::showMessage($message1,$message2);

        };

    }


    public static function showSurveysToGenerateLink($request, $id){

        self::$Survey = Survey::find($id);
        $SurveyQuestions = self::$Survey->Questions;
        self::$SurveyQuestionsAnswers='';

        foreach ($SurveyQuestions as $key => $SurveyQuestion)
        {
            self::$SurveyQuestionsAnswers[$key]=$SurveyQuestion;
            $idOfQuestions = $SurveyQuestion->id;
            $questions = Question::find($idOfQuestions);
            $answers_tmp = $questions->Answers;
            $SurveyQuestionsAnswers[$key]['answers'] = $answers_tmp;
        }


        if($request->responder_name != null)
        {
            self::$ResponderName = $request->responder_name;

        }   else {

            self::$ResponderName = "Some Name";

        }

        if($request->time_testing != null)
        {

            self::$PlanedTime = $request->time_testing;

        } else {

            self::$PlanedTime = 2;

        }

        return self::$encodeLink = url('/') .'/testing/'. base64_encode(self::$Survey->name.":".self::$PlanedTime.":".self::$ResponderName);

    }



    public static function getAllQuestionIdsInTest(){

        $search = SurveyQuestion::where('survey_id',SurveyClass::$SurveyID)
            ->pluck('question_id');
        self::$SurveyQuestion = $search;
        return self::$SurveyQuestion;

    }


    public static function getQuestionForTest(){

        // смотрим есть ли неотвеченные вопросы
        // 1) смотрим какие есть вообще вопросы в этом тесте для этого начинаем их переберать
        // 2) берем первый смотрим есть ли он в тесте
        // 3) если он в тесте присутсвует (т.е. иеется его responder_name, question_id, answer_id)
        // 4) в этом случае ищем соедующий
        // 3) если его в тесте нет, значит выводим его на экран

        //получаем все id вопросов которые есть в тесте
        $questionsIds = SurveyClass::getAllQuestionIdsInTest();

        // перебераем все ID вопросвов которые есть в тесте
        foreach ($questionsIds as $questionId){
            //ищем вопрос с ID
            //dump($questionId);
            //определяем присутсвует ли этот вопрос в таблице с результатами
            //если присутсвует - пропускаем его, если нет - берем его для вывода
            if (self::doesQuestionExistInResultTable($questionId)==false){

                //ищем вопрос с ID
                $question = Question::find($questionId);
                //dump($question);
                return $question;

            };
        }

        //It means that the test was completed
        //save test status on Result table
        self::saveCompleteStatus();

        //Showing message ThankYou
        $main_message = "This test was completed.";
        $second_message = self::$ResponderName.", to get results, please contact to administrator";
        self::showMessage($main_message,$second_message);
        return "Test was complete";
    }

    public static function saveCompleteStatus(){

        //search last record in table Results
        $lastRecord = self::searchLastSavedRecordAtResults(self::$SurveyID,self::$ResponderName);

        //set status Complete for last record
        $lastRecord->status = "Complete";
        $lastRecord->save();
        return true;
    }


    public static function doesQuestionExistInResultTable($id){
        //ищем вопрос в таблице с результатами по параметрам responder_name, survey_id,
        $searchResult = Result::where('responder_name',SurveyClass::$ResponderName)
                        ->where('servey_id',SurveyClass::$SurveyID)
                        ->where('question_id',$id)
                        ->get();

        if(count($searchResult)==0){
            // табличка Result не содежит вопроса с таким ID
            return false;

        } else {
            //в табличке Result есть запись с таким ID
            return true;

        }


    }

    public static function getAnswerOptionsForQuestion($questionId){

        $findQuestion = Question::find($questionId);
        return $findQuestion->Answers;
		
    }

    public static function searchLastSavedRecordAtResults($surveyID,$responderName){

        $searchRecord = Result::all()->where("servey_id",$surveyID)
                    ->where("responder_name",$responderName)
                    ->last();
        return $searchRecord;
    }



}