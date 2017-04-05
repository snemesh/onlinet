@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ul class="nav nav-pills">
                        <li class="active"><a href="{{ url('/home') }}">Surveys</a></li>
                        <li><a href="{{ url('/question') }}">Questions</a></li>
                        <li><a href="{{ url('/reports') }}">Reports</a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    @include('questions.surwayslist')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
