{!! Form::open(['action' => 'QuestionController@correctQuestionAndAnsers']) !!}
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
        Edit the question...
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12">
                <form role="form" action="">
                    <div class="form-group">
                        <label for="">Edit your question:</label>
                        <input type="hidden" name="id" value="{{ $editQuestion->id }}">
                        <input type="text" class="form-control" name="editquestion" value="{{ $editQuestion->question_name }}">
                        <p class="help-block">We will store this question on the database</p>
                    </div>
                    <div class="form-group">
                        <label for="">Please correct the description for the question:</label>
                        <textarea type="text" class="form-control" name="editdiscription">{{ $editQuestion->description }}</textarea>
                        <p class="help-block">We will store this chenges on the database</p>
                    </div>
                    <div>
                        <div class="form-group">
                            <a class="list-group-item active">
                                Answers for the questions:
                            </a>
                            <a class="list-group-item">
                                <div class="panel-body">
                                    <div class="row">

                                        @foreach($editAnswers as $editAnswer)
                                            <input type="hidden" name={{"idOfAnswer".$editAnswer->id }} value="{{ $editAnswer->id }}">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Edit answer option1"
                                                                 name={{"answer".$editAnswer->id }} value="{{ $editAnswer->users_anwser }}">
                                            </div>

                                        @endforeach

                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Edit the right answer:</label>
                        <input class="form-control" name="right_answer" placeholder="Enter anwer" value="{{ $editQuestion->answer }}">
                    </div>
                    <a class="btn btn-primary pull-left" href='/question'>Back</a>
                    <button type="submit" class="btn btn-primary pull-right">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

{!! Form::token() . Form::close() !!}

