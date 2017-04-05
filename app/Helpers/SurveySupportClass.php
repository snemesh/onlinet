<?php

namespace App\Helpers;

use Validator;
use App\Survey;
use App\Question;
use App\SurveyQuestion;

class SurveySupportClass {

    private     $validateMessages;
    private     $validationRules;
    private     $validationError;

    function __construct()
    {

        $this->validateMessages = [

            'survayname.required'  => 'You should enter new name for the survay',
            'arrayOfids.required'  => 'Please check questions wich will be include to the survey'
        ];


        $this->validationRules = array(

            'survayname' => 'required|string|max:250',
            'arrayOfids' => 'required',
        );

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

    public function saveSurvey($request){


        $survey = new Survey();
        $survey->name = $request->survayname;
        $survey->user_id = \Auth::user()->id;
        if($request->survaydiscription!=$survey->discription){

            $survey->discription=$request->survaydiscription;

        }

        $survey->save();
        return $survey->id;
    }

    public function saveSurveyQuestions($request, $createdId){

        $arrayOfids = explode(",",$request->input('arrayOfids'));

        if(!empty($arrayOfids)){

            foreach ($arrayOfids as $key => $id){

                $question = Question::find($id);
                $questionIdforSurvey = $question->id;

                $survey_question = new SurveyQuestion();
                $survey_question->question_id = $questionIdforSurvey;
                $survey_question->survey_id = $createdId;
                $survey_question->save();

            }
        }

        return true;
    }

    public function surveyUpdate($request, $id){

        $survey = Survey::find($id);

        if ($request->survayname!=$survey->name){

            $survey->name = $request->survayname;
            $survey->save();
        }

        if ($request->survaydiscription!=$survey->discription){

            $survey->discription = $request->survaydiscription;
            $survey->save();

        }

        $survey_questions = SurveyQuestion::all()->where('survey_id',$id);
        $arrayOfids = explode(",",$request->input('arrayOfids'));

        $toDelete=[];
        foreach ($survey_questions as $survey_question){
            $toDelete[]=$survey_question->question_id;
        }

        $delete_question_id=array_diff($toDelete,$arrayOfids);
        $survey->Questions_id()->whereIn('question_id', $delete_question_id)->delete();



    }
}