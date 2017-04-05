{!! Form::open(['testing'=>'createlink']) !!}

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <a class="list-group-item active">
                        Current question:
                    </a>
                    <div class="list-group-item">
                        <div class="panel-body">
                            <div class="row">
                                <span>{{ $questions->question_name }}</span>
                                <input type="hidden" name="question_id" value="{{ $questions->id }}">
                                <ul>
                                    @foreach($answers as $answer)
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="answerforquestion" id="answer" value={{$answer->id}}>
                                                {{ $answer->users_anwser }}
                                            </label>
                                        </div>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <button id="test" type="button" class="btn btn-primary" >Check</button>
                <button id="checkid" type="submit" class="btn btn-primary pull-right">Save answer</button>
                <input type="hidden" id="arrayOfids" name="arrayOfids" value="">
            </div>
        </div>
    </div>
{!! Form::token() . Form::close() !!}


