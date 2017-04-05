<?php

namespace App\Http\Controllers;

use App\Helpers\ReportClass;
use Illuminate\Http\Request;


class ReportController extends Controller
{
    public function showReport(ReportClass $reportClass  ) {

        $reports = ReportClass::getSurveyResult();
        return view('report')->with('reports',$reports);
    }
}
