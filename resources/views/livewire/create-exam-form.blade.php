<div>
    <div class="d-flex justify-content-between align-items-center mt-3">
        <h5 class="">Questions</h5>
        <button class="btn  btn-link m-0 text-lg" type="button" id="addQuestion" onclick="x()"><i
                class="fa fa-plus"></i>
        </button>
    </div>

    <div class="accordion accordion-flush" id="accordionExample">
        @for($i=1;$i<=$questionNumber;$i++)
            <div class="question accordion-item card my-3" id="q_{{$i}}">
                <h2 class="card-header p-0 d-flex justify-content-center align-items-center" id="heading_{{$i}}">

                    <button class="accordion-button text-bold collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse_{{$i}}" aria-expanded="false" aria-controls="collapse_{{$i}}">
                        Question {{$i}}
                    </button>
                    @if($i != 1)

                        <button class="btn btn-link m-0 text-danger delQ" data-id="0"><i class="fa fa-trash"></i>
                        </button>

                    @endif
                </h2>

                <div id="collapse_{{$i}}" class="accordion-collapse collapse" aria-labelledby="heading_{{$i}}"
                     data-bs-parent="#accordionExample">
                    <div class="accordion-body card-body ">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Question</label>
                                <input class="form-control" form="qForm" type="text" name="questions[{{$i}}]" required
                                       value="{{old('questions')}}"
                                >
                            </div>
                        </div>
                        <div class="options">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="radio" name="option_correct" value="1"
                                               id="option_1_correct" required>
                                        <label class="form-check-label" for="option_1_correct">Correct?</label>
                                    </div>

                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <input class="form-control" type="text"
                                               name="option_1" value="{{old('option_1')}}" autocomplete="subject"
                                               placeholder="Option 1" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="radio" name="option_correct" value="2"
                                               id="option_2_correct" required>
                                        <label class="form-check-label" for="option_2_correct">Correct?</label>
                                    </div>

                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <input class="form-control" type="text"
                                               name="option_2" value="{{old('option_2')}}" autocomplete="subject"
                                               placeholder="Option 2" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="radio" name="option_correct" value="3"
                                               id="option_3_correct" required>
                                        <label class="form-check-label" for="option_3_correct">Correct?</label>
                                    </div>

                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <input class="form-control" type="text"
                                               name="option_3" value="{{old('option_3')}}" autocomplete="subject"
                                               placeholder="Option 3" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="radio" name="option_correct" value="4"
                                               id="option_4_correct" required>
                                        <label class="form-check-label" for="option_4_correct">Correct?</label>
                                    </div>

                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <input class="form-control" type="text"
                                               name="option_4" value="{{old('option_4')}}" autocomplete="subject"
                                               placeholder="Option 4" required>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        @endfor

    </div>
</div>
