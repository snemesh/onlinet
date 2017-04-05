{!! Form::open(['action' => 'QuestionController@store']) !!}
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
        Creating new question...
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12">
                <form role="form" action="">
                    <div class="form-group">
                        <label for="">Enter your question:</label>
                        <input type="text" class="form-control" name="newquestion">
                        <p class="help-block">We will store this question on the database</p>
                    </div>
                    <div class="form-group">
                        <label for="">Enter description for the question:</label>
                        <textarea type="text" class="form-control" name="newdiscription"></textarea>
                        <p class="help-block">We will store this question on the database</p>
                    </div>
                    <div>
                        <div class="form-group">
                            <a class="list-group-item active">
                                Answers for the questions:
                            </a>
                            <a class="list-group-item">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Enter answer option1" name="answer1">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Enter answer option2" name="answer2">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Enter answer option3" name="answer3">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Enter answer option4" name="answer4">
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Enter right answer:</label>
                        <input class="form-control" name="right_answer" placeholder="Enter anwer">
                    </div>
                    <a class="btn btn-primary pull-left" href="/question">Back</a>
                    <button type="submit" class="btn btn-primary pull-right">Save question</button>
                </form>
            </div>
        </div>
    </div>
</div>

{!! Form::token() . Form::close() !!}

