<x-app-layout>


    <div @class('row')>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Edit {{$exam->name}} Exam</p>

                    </div>
                </div>
                <div class="card-body">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors"/>
                    <form method="post" action="{{route('backend.exams.update',$exam)}}"
                          enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Name</label>
                                    <input class="form-control" type="text" name="name"
                                           value="{{$exam->name}}" required>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <h5 class="">Questions</h5>
                            <button class="btn  btn-link m-0 text-lg" type="button" id="addQuestion" onclick="x()"><i
                                    class="fa fa-plus"></i>
                            </button>
                        </div>

                        <div class="accordion accordion-flush" id="accordionExample">
                            @foreach($exam->questions as $index => $question)
                                <div class="question accordion-item card my-3" id="q_{{$index+1}}">
                                    <h2 class="card-header p-0 d-flex justify-content-center align-items-center"
                                        id="heading_{{$index+1}}">
                                        <button class="accordion-button text-bold collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapse_{{$index+1}}" aria-expanded="false"
                                                aria-controls="collapse_{{$index+1}}">
                                            Question {{$index+1}}
                                        </button>
                                        @if($index > 0)
                                            <button type="button" class="btn btn-link m-0 text-danger delQ"
                                                    onclick="delQ(this,event)"
                                                    data-id="{{$index+1}}"><i class="fa fa-trash"></i></button>

                                        @endif
                                    </h2>
                                    <div id="collapse_{{$index+1}}" class="accordion-collapse collapse"
                                         aria-labelledby="heading_{{$index+1}}"
                                         data-bs-parent="#accordionExample">
                                        <div class="accordion-body card-body ">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="example-text-input"
                                                           class="form-control-label">Question</label>
                                                    <input class="form-control" type="text"
                                                           name="questions[{{$question->id}}]" required
                                                           value="{{$question->question}}"
                                                    >
                                                </div>
                                            </div>
                                            <div class="" id="multiple-choice_{{$index+1}}">

                                                @foreach($question->options as $inOp => $option)
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="radio"
                                                                       name="option_correct[{{$question->id}}]"
                                                                       value="{{$option->id}}"
                                                                       id="{{$index+1}}_option_{{$option->id}}_correct" required
                                                                    {{$option->correct ? 'checked' :''}}
                                                                >
                                                                <label class="form-check-label"
                                                                       for="{{$index+1}}_option_{{$option->id}}_correct">Correct?</label>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="form-group">
                                                                <input class="form-control" type="text"
                                                                       name="options[{{$question->id}}][{{$option->id}}]"
                                                                       value="{{$option->option}}"
                                                                       autocomplete="subject"
                                                                       placeholder="Option {{$inOp+1}}"
                                                                       required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>


                                        </div>
                                    </div>

                                </div>
                            @endforeach

                        </div>


                        <div class="col-md-6">
                            <button type="submit" @class('btn btn-success') >Update</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
