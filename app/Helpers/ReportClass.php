<?php

namespace App\Helpers;
use App\Result;
use App\Survey;


class ReportClass {

    private static $responder;

    public static function getSurveyResult(){
        // 1) получаем все записи в табличке Result и группируем их servey_id
	    // 2) перебераем все ID из полученного масива
        // 3) подсчитываем общее кол-во ответов в каждом опросе
	    // 4) подсчитываем количество правельных ответов
	    // 5) берем процент правельных к неправельным
	    // 6) выводим эту информацию в отчете
	    $report=[];
	    $totalReport=[];
	    foreach (self::getAllRecordsFromResultTable() as $collections){
	    	
	    	foreach ($collections  as $results){
                //setup clear variables to count
	    	    $countQuestions=0;
                $countRightAnswers=0;
	    		$responderName = '';
	    		$surveyId='';
                //end block

                //Iterate array with data
	    		foreach ($results as $result){
                    //saving Responder Name
                    $responderName = $result->responder_name;
                    //saving SurveyID
                    $surveyId = $result->servey_id;

                    //Count Right answers
                    if($result->result == 'Correct'){
                        //save it
                        $countRightAnswers++;

                    }
                    //Count all questions
                    $countQuestions++;
			    }

			    //Save all counters to temp Array
			    $report["responderName"] = $responderName;
                $surveyObj = Survey::find($surveyId);
                $report["survey"] = $surveyObj->name;
                $report["TotalQuestions"] = $countQuestions;
                $report["TotalRightAnswers"] = $countRightAnswers;

                //Calculate percentage of Right Answers
                if($countQuestions!=0){

                    $report["percentage"] = $countRightAnswers/$countQuestions*100;

                } else {

                    $report["percentage"] = 0;
                }

                //Save results to final array
                $totalReport[]=$report;
		    }

	    }

        return $totalReport;
    
    
    }


    public static function getAllRecordsFromResultTable(){
    	
    	$total = Result::all()->groupBy("responder_name",'desk')->groupBy('servey_id');
        

    	return $total;
    }
    
    public static function getTotalNumberOfQuestions($id, $responderName){
	
    	
	    return Result::where();
    }

    public static function getTotalRightAnswers(){
	
    	
	    return true;
    }
    
    public static function getPercentageOfRightAnswers(){
	
    	
	    return true;
    }
    
    
    public static function showThisResultInReport(){


    }


}