@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Survey: {{ $survey->name }} for {{ $responderName }}
                    <span class="pull-right" id="my_timer" style="color: #5194d5; font-size: 150%; font-weight: bold;">00:00:{{$respondTime}}</span>
                </div>

                <div class="panel-body">
                    @include('questions.showtest')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

