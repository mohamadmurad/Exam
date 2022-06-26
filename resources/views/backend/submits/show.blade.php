<x-app-layout>


    <div class="row mt-2">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Exams Submits </h6>

            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Exam Name
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Student
                                Name
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($submit->answers as $answer)

                            <tr>
                                <td>{{$answer->question}}</td>
                                <td>{{$answer->pivot->option->option }}</td>
                                <td><span class="badge  {{$answer->pivot->option->correct ? 'bg-success':'bg-danger'}}">{{$answer->pivot->option->correct ? 'Yes':'No'}}</span></td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
