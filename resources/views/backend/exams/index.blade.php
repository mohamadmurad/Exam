<x-app-layout>


    <div class="row mt-2">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Exams </h6>
                <a href="{{route('backend.exams.create')}}" @class('btn btn-success')>Create New
                    Exam</a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Exam Name
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Question
                                Count
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($exams as $exam)
                            <tr>
                                <td>{{$exam->name}}</td>
                                <td>{{$exam->questions_count}}</td>
                                <td>
                                    <form
                                        action="{{route('backend.exams.destroy',['exam'=>$exam])}}"
                                        method="POST">
                                        @csrf
                                        @method('delete')
                                        <a class="text-secondary font-weight-bold text-xs btn btn-link"
                                           href="{{route('backend.exams.submits',['exam'=>$exam])}}"><i
                                                class="fa fa-check me-2"></i> Submits </a>
                                        <a class="text-secondary font-weight-bold text-xs btn btn-link"
                                           href="{{route('backend.exams.show',['exam'=>$exam])}}"><i
                                                class="fa fa-eye me-2"></i> Show </a>
                                        <a class="text-secondary font-weight-bold text-xs btn btn-link"
                                           href="{{route('backend.exams.edit',['exam'=>$exam])}}"><i
                                                class="fa fa-pencil me-2"></i> edit </a>
                                        <a type="submit" class="text-danger font-weight-bold text-xs btn btn-link"
                                           onclick="delete_submit(this)"><i class="fa fa-trash me-2"></i>Delete</a>
                                    </form>


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
