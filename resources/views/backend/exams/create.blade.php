<x-app-layout>


    <div @class('row')>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Create Exam</p>

                    </div>
                </div>
                <div class="card-body">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors"/>
                    <form method="post" action="{{route('backend.exams.store')}}"
                          enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Name</label>
                                    <input class="form-control" type="text" name="name"
                                           value="{{old('name')}}" required>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <h5 class="">Questions</h5>
                            <button class="btn  btn-link m-0 text-lg" type="button" id="addQuestion" onclick="x()"><i class="fa fa-plus"></i>
                            </button>
                        </div>

                        <div class="accordion accordion-flush" id="accordionExample">
                            <div class="question accordion-item card my-3" id="q_1">
                                <h2 class="card-header p-0 d-flex justify-content-center align-items-center" id="heading_1">
                                    <button class="accordion-button text-bold collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse_1" aria-expanded="false" aria-controls="collapse_1">
                                        Question 1
                                    </button>
                                    {{--                        <button class="btn btn-link m-0 text-danger delQ" data-id="0"><i class="fa fa-trash"></i></button>--}}
                                </h2>
                                <div id="collapse_1" class="accordion-collapse collapse" aria-labelledby="heading_1"
                                     data-bs-parent="#accordionExample">
                                    <div class="accordion-body card-body ">

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Question</label>
                                                <input class="form-control"  type="text" name="questions[0]" required
                                                       value="{{old('questions')}}"
                                                >
                                            </div>
                                        </div>
                                        <div class=""  id="multiple-choice_1">


                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="radio" name="option_correct[0]" value="1"
                                                               id="0_option_1_correct" required>
                                                        <label class="form-check-label" for="0_option_1_correct" >Correct?</label>
                                                    </div>

                                                </div>
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <input class="form-control" type="text"
                                                               name="options[0][1]" value="{{old('options[0]')}}" autocomplete="subject" placeholder="Option 1" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="radio" name="option_correct[0]" value="2"
                                                               id="0_option_2_correct" required>
                                                        <label class="form-check-label" for="0_option_2_correct" >Correct?</label>
                                                    </div>

                                                </div>
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <input class="form-control" type="text"
                                                               name="options[0][2]" value="{{old('option_2')}}" autocomplete="subject" placeholder="Option 2" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="radio" name="option_correct[0]" value="3"
                                                               id="0_option_3_correct" required>
                                                        <label class="form-check-label" for="0_option_3_correct" >Correct?</label>
                                                    </div>

                                                </div>
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <input class="form-control" type="text"
                                                               name="options[0][3]" value="{{old('option_3')}}" autocomplete="subject" placeholder="Option 3" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="radio" name="option_correct[0]" value="4"
                                                               id="0_option_4_correct" required>
                                                        <label class="form-check-label" for="0_option_4_correct" >Correct?</label>
                                                    </div>

                                                </div>
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <input class="form-control" type="text"
                                                               name="options[0][4]" value="{{old('option_4')}}" autocomplete="subject" placeholder="Option 4" required>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>


                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="col-md-6">
                            <button type="submit" @class('btn btn-success') >create</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
