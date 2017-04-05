<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Request;
use Auth;
use App\Question;
use App\Answer;

class QuestionClass {


    private     $validateMessages;
    private     $validationRules;
    protected   $spentTime;
    private     $validationError;
    private     $findKey = 'idOfAnswer';
    private     $arrayOfIds;
    private     $currentUserId;

    function __construct()
    {

        $this->validateMessages = [

            'newquestion.required'  => 'You should enter the question',
            'right_answer.required' => 'You need to enter the right answer',
            'answer1.required'      => 'You shuold enter option of answer1',
            'answer2.required'      => 'You shuold enter option of answer2',
            'answer3.required'      => 'You shuold enter option of answer3',
            'answer4.required'      => 'You shuold enter option of answer4',
        ];


        $this->validationRules = array(
            //for table questions
            'newquestion' => 'required|string|max:250',
            'right_answer' => 'required_with:newquestion',
            //for table answers
            'answer1' => 'required_with:newquestion',
            'answer2' => 'required_with:newquestion',
            'answer3' => 'required_with:newquestion',
            'answer4' => 'required_with:newquestion',
        );

        $this->spentTime = 10;
    }

    /**
     * @return int
     */
    public function getSpentTime()
    {
        return $this->spentTime;
    }

    /**
     * @param mixed $arrayOfIds
     */
    public function setArrayOfIds($arrayOfIds)
    {
        $this->arrayOfIds = $arrayOfIds;
    }

    /**
     * @return mixed
     */
    public function getArrayOfIds()
    {
        return $this->arrayOfIds;
    }

    /**
     * @return string
     */
    public function getFindKey()
    {
        return $this->findKey;
    }
    /**
     * @return array
     */
    public function getValidateMessages()
    {
        return $this->validateMessages;
    }

    /**
     * @return array
     */
    public function getValidationRules()
    {
        return $this->validationRules;
    }

    /**
     * @return mixed
     */
    public function getValidationError()
    {
        return $this->validationError;
    }

    public function validate($request){

        $validator=Validator::make($request->all(),
            $this->getValidationRules(),
            $this->getValidateMessages());

        if ($validator->fails()) {

            $this->validationError = $validator;
            return false;
        }

        return true;
    }

    public function saveQuestionAndAnswers($request){


        $this->currentUserId = Auth::id();
        $question = new Question();
        $question->question_name    = $request->newquestion;
        $question->description      = $request->newdiscription;
        $question->answer           = $request->right_answer;
        $question->user_id          = $this->currentUserId;
        $question->save();

        $currentQuestionId =  $question->id;

        //Save 1 answer for the question
        $answer = new Answer();
        $answer->users_anwser       = $request->answer1;
        $answer->user               = $this->currentUserId;
        $answer->spent_time         = $this->spentTime;
        $answer->questions_id       = $currentQuestionId;
        $answer->save();

        //Save 2 answer for the question
        $answer = new Answer();
        $answer->users_anwser       = $request->answer2;
        $answer->user               = $this->currentUserId;
        $answer->spent_time         = $this->spentTime;
        $answer->questions_id       = $currentQuestionId;
        $answer->save();

        //Save 3 answer for the question
        $answer = new Answer();
        $answer->users_anwser       = $request->answer3;
        $answer->user               = $this->currentUserId;
        $answer->spent_time         = $this->spentTime;
        $answer->questions_id       = $currentQuestionId;
        $answer->save();

        //Save 4 answer for the question
        $answer = new Answer();
        $answer->users_anwser       = $request->answer4;
        $answer->user               = $this->currentUserId;
        $answer->spent_time         = $this->spentTime;
        $answer->questions_id       = $currentQuestionId;
        $answer->save();


    }

    public function saveChangesInAnswers($request){

        $this->currentUser = Auth::user()->id;
        $arrayOfIds = $request->all();

        //Save chenges in the answers
        foreach ($arrayOfIds as $key=>$value) {

            if (strpos($key, $this->findKey) !== false) {
                if(!null==$value){

                    $answer = Answer::find($value);
                    $getProp = $request->input("answer".$value);

                    if($answer->users_anwser != $getProp){

                        $answer->users_anwser = $getProp;

                        try {

                            $answer->save();

                        }catch (Exception $e){

                            return "We didn't find ansver of user, error - ".  $e;

                        }

                    }

                }


            }

        }
        return true;
    }

    public function saveChangesInQuestion($request){



        if ($request->has('id')) {
            try {

                $question = Question::find($request->id);

            } catch (Exception $e)
            {

                return "We didn't find Question with ID = ".$request->id." in database. Error ".$e."<br>";

            };

            if($question->question_name != $request->editquestion)
            {

                $question->question_name = $request->editquestion;
                $question->save();


            }
            if($question->description != $request->editdiscription)
            {


                $question->description = $request->editdiscription;
                try {

                    $question->save();

                }catch (Exception $e){

                    return "Something wrong saving of description. Error: ".$e;

                }

            }

            if($question->answer != $request->right_answer)
            {

                $question->answer = $request->right_answer;
                $question->save();

            }
        }
        return true;
    }

}