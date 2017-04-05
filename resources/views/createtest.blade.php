@extends('layouts.app')

@section('content')

    {!! Form::open(['test'=>'test']) !!}

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <a class="list-group-item active">
                                    Current suray: {{ $Survey->name }}
                                </a>
                                <div class="list-group-item">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label for="">Survey's link:</label>
                                            <input type="text" class="form-control" name="survey_link"
                                                   value="{{ $encodeLink }}">
                                            <p class="help-block">Please copy this link and send it to Responder</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Responder name:</label>
                                            <input type="text" class="form-control" name="responder_name"
                                                   placeholder="Responder Name"
                                                   value="{{ $request->responder_name or ''}}">
                                            <p class="help-block">Please specify Neme of responder of the test</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Question timer, sec</label>
                                            <input type="text" class="form-control" name="time_testing"
                                                   placeholder="30"
                                                   value="{{ $request->time_testing or '' }}">
                                            <p class="help-block">Please enter number of minutes for the testing</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Description for the survey:</label>
                                            <textarea type="text" class="form-control" name="discription" placeholder="Description unavalible for the test">
                                                {{ $Survey->description }}
                                            </textarea>
                                            <p class="help-block">You can use this survey with the link only one time</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="btn btn-primary pull-left" href="/home">Back</a>
                            <button id="checkid" type="submit" class="btn btn-primary pull-right">Regenerate link</button>
                            <input type="hidden" id="arrayOfids" name="arrayOfids" value="">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

    {!! Form::token() . Form::close() !!}
@endsection

