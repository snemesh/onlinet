<div class="panel panel-default">
    <div class="panel-heading">
        List of questions
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12">
                <a href="/createquestion">New question</a>
                <table class="table ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Qestion</th>
                            <th>Description</th>
                            <th>Right answer</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($questionList as $question)
                            <tr>
                                <th scope="row">{{ $question->id }}</th>
                                <td>{{ $question->question_name }}</td>
                                <td>{{ $question->description }}</td>
                                <td>{{ $question->answer }}</td>
                                <td><a href={{"/delete/{$question->id}"}}>Delete </a><a href="{{"/edit/{$question->id}"}}">Edit</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

