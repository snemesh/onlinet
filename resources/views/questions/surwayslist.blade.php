<div class="panel panel-default">
    <div class="panel-heading">
        List of Survay
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12">
                <a href="/creatsurvay">New Survay</a>
                @if( !is_null( $survays) )
                    <table class="table ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Survay name</th>
                                <th>Description</th>
                                <th><span class="pull-right">Link</span></th>
                                <th><span class="pull-right">Delete</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach($survays as $survay)
                                    <th scope="row">{{ $survay->id }}</th>
                                    <td><a href="{{"/editsurvay/{$survay->id}"}}">{{ $survay->name }}</a></td>
                                    {{--<td><a href="{{"/test/$survay->id"}}">{{ $survay->name }}</a></td>--}}
                                    <td>{{ $survay->description }}</td>
                                    <td><a href="{{"/test/$survay->id"}}"><span class="glyphicon glyphicon-send pull-right"></span></a></td>
                                    {{--<td><a href="{{"/editsurvay/{$survay->id}"}}"><span class="glyphicon glyphicon-pencil pull-right"></span></a></td>--}}
                                    <td><a href={{"/deletesurvay/{$survay->id}"}}><span class="glyphicon glyphicon-trash  pull-right"></span> </a></td>

                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                @else
                    <h3>Your list of surveys is empty. Please create new one.</h3>
                @endif
            </div>
        </div>
    </div>

</div>

