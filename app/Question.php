<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $table = 'questions';
    protected $primaryKey = 'id';
    protected $fillable = ['question_name'];

    public function Answers() {

        return $this->hasMany('App\Answer','questions_id','id');

    }

}
