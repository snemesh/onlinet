@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Survey board</div>

                <div class="panel-body">
                    @include('questions.newsurvay')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

