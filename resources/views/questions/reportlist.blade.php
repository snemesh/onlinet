<div class="panel panel-default">
    <div class="panel-heading">
        Report
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12">

                @if( !is_null( $reports) )
                    <table class="table ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Responder name</th>
                                <th>Survey name</th>
                                <th>Total Questions</th>
                                <th>Total Right Answers</th>
                                <th>Percent of Right Answers, %</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach($reports as $key => $report)
                                    <th scope="row">{{ $key }}</th>
                                    <td>{{ $report['responderName'] }}</td>
                                    <td>{{ $report['survey'] }}</td>
                                    <td>{{ $report['TotalQuestions'] }}</td>
                                    <td>{{ $report['TotalRightAnswers'] }}</td>
                                    <td>{{ round($report['percentage'],1) }}%</td>


                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                @else
                    <h3>We don't have any results.</h3>
                @endif
            </div>
        </div>
    </div>

</div>

