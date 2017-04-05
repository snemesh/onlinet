{!! Form::open(['/editsurvay'=>'editsurvay']) !!}

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="panel panel-default">

    <div class="panel-heading">
        Edit your survey
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12">
                    <div class="form-group">
                        <label for="">Edit name for the survey:</label>
                        <input type="text" class="form-control" name="survayname" value={{ $editSurvey->name }}>
                        <p class="help-block">This changes will store on the database</p>
                    </div>
                    <div class="form-group">
                        <label for="">Correct description for the survey:</label>
                        <textarea type="text" class="form-control" name="survaydiscription">{{ $editSurvey->discription }}</textarea>
                        <p class="help-block">We will store this description on the database</p>
                    </div>
                    <div>
                        <div class="form-group">
                            <a class="list-group-item active">
                                List of questions:
                            </a>
                            <div class="list-group-item">
                                <div class="panel-body">
                                    <div class="row">

                                        @if( isset($editSurveyQuestions[0]) )

                                            <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Question</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                                @foreach($editSurveyQuestions as $editSurveyQuestion)
                                                <tr>
                                                    <td>
                                                        <input checked id="checkquestion" type="checkbox" name="editSurveyQuestion" value={{ $editSurveyQuestion->id }} >
                                                    </td>
                                                    <td>
                                                        {!! $editSurveyQuestion->question_name  !!}
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-primary pull-right" href= {!! "/edit/$editSurveyQuestion->id" !!} >View Question</a>
                                                    </td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                        @else
                                            <div class="alert alert-warning" >
                                                <h5>
                                                    <p class="text-center">
                                                        You haven't questions for this survey, please delete it and create new one.
                                                    </p>
                                                </h5>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-primary pull-left" href="/home">Back</a>
                    {{--<button id="checkid1" type="button" class="btn btn-primary" >Check</button>--}}
                    <button id="checkid" type="submit" class="btn btn-primary pull-right">Save survay</button>
                    <input type="hidden" id="arrayOfids" name="arrayOfids" value="">
            </div>
        </div>
    </div>
</div>

{!! Form::token() . Form::close() !!}


