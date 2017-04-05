<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();


Route::get('/home', 'SurveyController@index')->middleware('auth');
Route::get ('creatsurvay', 'SurveyController@create')->middleware('auth');
Route::post('creatsurvay', 'SurveyController@store')->middleware('auth');
Route::get('/deletesurvay/{id}','SurveyController@destroy')->middleware('auth');;
Route::get('/editsurvay/{id}','SurveyController@edit')->middleware('auth');
Route::post('/editsurvay/{id}','SurveyController@update')->middleware('auth');



//Route::get('/home', 'QuestionController@index');
Route::get('/question', 'QuestionController@index')->middleware('auth');
// Show form of creation of question...
Route::get('/createquestion', function (){
    return view('newquestion');
})->middleware('auth');

// Save new question in database...
Route::post('/createquestion', 'QuestionController@store')->middleware('auth');
Route::get('/delete/{id}','QuestionController@destroy')->middleware('auth');;
Route::get('/edit/{id}','QuestionController@edit')->middleware('auth');

//Save changes for Question and Ansvers
Route::post('/edit','QuestionController@correctQuestionAndAnsers');


Route::get('/test/{id}', 'TestingController@show')->middleware('auth');
Route::post('/test/{id}', 'TestingController@show')->middleware('auth');


Route::get('testing/{link}', 'TestingController@showQuestion')->middleware('auth');
Route::post('testing/{link}', 'TestingController@storeAnswersForQuestion')->middleware('auth');

//To display custom message
Route::get('message', [ 'as' => 'message' ], function ($message1,$message2){
    return view('message')->with('message1',$message1)->with('message1',$message2);
})->middleware('auth');


Route::get('/reports', "ReportController@showReport");
