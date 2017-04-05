{!! Form::open(['/creatsurvay'=>'creatsurvay']) !!}

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
        Creating new survay...
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12">
                    <div class="form-group">
                        <label for="">Enter name for the survay:</label>
                        <input type="text" class="form-control" name="survayname">
                        <p class="help-block">This survay will store on the database</p>
                    </div>
                    <div class="form-group">
                        <label for="">Enter description for the survay:</label>
                        <textarea type="text" class="form-control" name="survaydiscription"></textarea>
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
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Qestion</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($questions as $question)
                                            <tr>
                                                <td>
                                                    <input id="checkquestion" type="checkbox" value={{ $question->id }}>
                                                </td>
                                                <td>
                                                    {!! $question->question_name  !!}
                                                </td>
                                                <td>
                                                    <a href="#" class="btn btn-primary pull-right">View</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
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


