<x-front-layout>

    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Welcome {{\Illuminate\Support\Facades\Auth::user()->name}}</h2>
            </div>

        </div>


        <div class="row">
            <table class="table">
                <thead>
                <tr>
                    <th class="text-start">Exam</th>
                    <th>Status</th>
                    <th>Mark</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($exams as $exam)
                    <tr>
                        <td> {{$exam->name}}</td>
                        <td>
                            @if($submit = $exam->authSubmit()->first())
                                <span class="badge bg-secondary">Submitted</span>
                            @else
                                <span class="badge bg-info">Waiting submit</span>
                            @endif

                        </td>
                        <td>
                            @if($submit )
                                @if($submit->final_mark >= 50 )
                                    <span class="badge bg-success">{{$submit->final_mark}}%</span>
                                @else
                                    <span class="badge bg-danger">{{$submit->final_mark}}%</span>
                                @endif

                            @else
                                <span class="badge bg-info">Waiting submit</span>
                            @endif

                        </td>
                        <td>
                            @if($submit )
                                <a class="mx-1" href="{{route('student.exam.submit',$exam)}}">
                                    <i class="fa fa-eye"></i>
                                    Show Result
                                </a>

                            @else
                                <a class="mx-1 " href="{{route('student.exam.submit',$exam)}}">
                                    <i class="fa fa-pencil-alt"></i>
                                    Start
                                </a>

                            @endif



                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>


            {{$exams->links()}}
        </div>


    </div>


</x-front-layout>
