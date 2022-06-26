<x-app-layout>


    <div class="row mt-2">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Exam {{$exam->name}} </h6>

            </div>

            <div class="row">
                <div class="col-12">
                    <ul>


                        @foreach($exam->questions as $question)
                            <li>
                                <div class="">
                                    <h3>{{$question->question}}</h3>
                                </div>
                                <div class="d-flex gap-2">
                                    @foreach($question->options as $option)
                                        <span class="badge {{$option->correct ? 'bg-success':'bg-info'}}">{{$option->option}}</span>
                                    @endforeach
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>


        </div>
    </div>


</x-app-layout>
