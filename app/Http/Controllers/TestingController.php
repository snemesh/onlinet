<?php

namespace App\Http\Controllers;

use App\Question;
use App\Result;
use App\Survey;
use Illuminate\Http\Request;
use Hashids\Hashids;
use Symfony\Component\VarDumper\Cloner\Data;
use App\Helpers\SurveyClass;
use Illuminate\Http\Response;

class TestingController extends Controller
{

    public function show(Request $request, SurveyClass $surveyClass, $id){

        $surveyClass::showSurveysToGenerateLink($request, $id);

        $SurveyQuestionsAnswers = $surveyClass::$SurveyQuestionsAnswers;
        $Survey                 = $surveyClass::$Survey;
        $encodeLink             = $surveyClass::$encodeLink;
        $validTime              = $surveyClass::$PlanedTime;

        return view('createtest')
            ->with('SurveyQuestionsAnswers',$SurveyQuestionsAnswers)
            ->with('Survey',$Survey)
            ->with('encodeLink',$encodeLink)
            ->with('validTime',$validTime)
            ->with('request', $request);

    }


    public function showQuestion(SurveyClass $surveyClass, $link){

        // инициируем опросник
        SurveyClass::init($link);

        //ищем вопрос который можно показать клиенту
        $questions  = SurveyClass::getQuestionForTest();

        // ищем все варианты ответов для этого воропса
        $answers = SurveyClass::getAnswerOptionsForQuestion($questions->id);

        $survey = SurveyClass::$Survey;

        $responderName = SurveyClass::$ResponderName;

        $respondTime = SurveyClass::$PlanedTime;

        return view('showtest')
            ->with('questions',$questions)
            ->with('answers',$answers)
            ->with('survey',$survey)
            ->with('responderName',$responderName)
            ->with('respondTime',$respondTime);

    }

    public function storeAnswersForQuestion(Request $request, SurveyClass $surveyClass, $link){

        SurveyClass::init($link);
        // если есть ответы от пользователя то сохраняем его результаты
        if ($request->all() != null){

            if($request->question_id!=null){

                SurveyClass::saveUserAnswerToResult($request);

            }
        }

        return back();
    }


}
