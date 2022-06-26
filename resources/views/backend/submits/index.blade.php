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
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mark</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($submits as $submit)
                            <tr>
                                <td>{{$submit->exam->name}}</td>
                                <td>{{$submit->student->name}}</td>

                                <td>   @if($submit->final_mark >= 50 )
                                        <span class="badge bg-success">{{$submit->final_mark}}%</span>
                                    @else
                                        <span class="badge bg-danger">{{$submit->final_mark}}%</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="text-secondary font-weight-bold text-xs btn btn-link"
                                       href="{{route('backend.exams.submits.show',['exam'=>$exam,'submit'=>$submit])}}"><i
                                            class="fa fa-eye me-2"></i> Show </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
