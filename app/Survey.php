<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Survey extends Model
{
    protected $table = "surveys";

    public function Questions() {

        return $this->belongsToMany('App\Question','survey_questions','survey_id','question_id');

    }

    public function Questions_id() {

        return $this->hasMany('App\SurveyQuestion','survey_id');

    }

    public function Answers() {

        return $this->hasManyThrough('App\Answer','App\Question','id','questions_id');

    }

    public $ans;

}
