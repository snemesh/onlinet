<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Helpers\QuestionClass;
use App\Question;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\MessageBag;
use Illuminate\Validation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Session;
use Illuminate\Http\Response;
use Auth;
use Illuminate\Support\Facades\Route;
use View;
class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questionList = Question::all();

        return view('home')->with('questionList', $questionList);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, QuestionClass $questionClass)
    {
        //validation request process
        if($questionClass->validate($request)==false){

            $validator = $questionClass->getValidationError();
            return redirect('/createquestion')
                ->withErrors($validator)
                ->withInput();
        };

        $questionClass->saveQuestionAndAnswers($request);

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $editQuestion = Question::all()->find($id);
        $editAnswers = Answer::all()->where('questions_id',$id);


        //$path = explode(url('/'), \URL::previous());
        //$route = "/".$path[1];

        $route = \URL::previous();

        return view('editquestion')
                ->with('editQuestion',$editQuestion)
                ->with('editAnswers',$editAnswers)
                ->with('route', $route);
        
    }

    public function correctQuestionAndAnsers(Request $request, QuestionClass $questionClass)
    {

        $questionClass->setArrayOfIds($request->all());

        //Save chenges in the answers
        $questionClass->saveChangesInAnswers($request);

        //Save chenges in the answers
        $questionClass->saveChangesInQuestion($request);

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

        $deleteAnswers = Answer::all()->where('questions_id',$id)->pluck('id')->toArray();
        Answer::destroy($deleteAnswers);
        Question::destroy($id);

        return back();
    }

}
