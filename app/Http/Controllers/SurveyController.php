<?php

namespace App\Http\Controllers;

use App\Helpers\SurveyClass;
use App\Helpers\SurveySupportClass;
use App\Question;
use App\Survey;
use App\SurveyQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Illuminate\Http\Response;
use Auth;
use View;
use Illuminate\Http\RedirectResponse;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $currentUserId = Auth::user()->id;
        $surveys = Survey::all()->where('user_id',$currentUserId);
        return view('survay')->with('survays',$surveys);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $questions = Question::all();
        return view('newsurvay')->with('questions',$questions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, SurveySupportClass $surveySupportClass)
    {

        if($surveySupportClass->validate($request)==false){

            $validator = $surveySupportClass->getValidationError();
            return back()->withErrors($validator)->withInput();
        };

        $createdId = $surveySupportClass->saveSurvey($request);
        $surveySupportClass->saveSurveyQuestions($request, $createdId);

        return back();

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $editSurvey = Survey::all()->find($id);
        $editSurveyQuestions = $editSurvey->Questions;

        $route = \URL::previous();

        return view('editsurvay')
            ->with('editSurvey',$editSurvey)
            ->with('editSurveyQuestions',$editSurveyQuestions)
            ->with('route',$route);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, SurveySupportClass $surveySupportClass, $id)
    {
        //работает не корректно
        $surveySupportClass->surveyUpdate($request, $id);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $survey = Survey::find($id);
        $survey->Questions_id()->delete();
        Survey::destroy($id);
        return back();

    }
}
