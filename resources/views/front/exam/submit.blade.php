<x-front-layout>

    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Exam {{$exam->name}}</h2>
            </div>
        </div>
        <div class="row">


            @if(!$exam->authSubmit()->first())
                <form action="{{route('student.exam.store',['exam'=>$exam])}}"
                      method="post">
                    @else
                        <h4>Your Mark {{$exam->authSubmit()->first()->final_mark}}%</h4>
                    @endif

                    @csrf

                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            @foreach($exam->questions as $index=>$question)
                                <button class="nav-link {{$index == 0 ? 'active':''}}" id="nav-home-tab"
                                        data-bs-toggle="tab"
                                        data-bs-target="#q_{{$index}}" type="button" role="tab"
                                        aria-controls="q_{{$index}}" aria-selected="true">

                                    @if($exam->authSubmit->first())
                                        @if( $exam->authSubmit()->first()->correctQuestion($question->id) )
                                            <svg fill="#1F8354" class="_ufjrdd" viewBox="0 0 48 48" role="img"
                                                 aria-labelledby="Completedd75e1050-e1de-4d77-d4f6-e07d1ea8e3e7 Completedd75e1050-e1de-4d77-d4f6-e07d1ea8e3e7Desc"
                                                 xmlns="http://www.w3.org/2000/svg"
                                                 style="fill: rgb(54, 59, 66); height: 20px; width: 20px; margin-right: 12px;">
                                                <title id="Completedd75e1050-e1de-4d77-d4f6-e07d1ea8e3e7">
                                                    Completed</title>
                                                <path
                                                    d="M1 24C1 11.318375 11.318375 1 24 1s23 10.318375 23 23-10.318375 23-23 23S1 36.681625 1 24zm20.980957 4.2558594l-7.7418213-7.0596924L12 23.5592041l9.980957 9.6016846 15.2832032-16.4852295L34.9130859 14 21.980957 28.2558594z"
                                                    fill="#1F8354" role="presentation"></path>
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                 style="fill: rgb(221 51 51); height: 20px; width: 20px; margin-right: 12px;">
                                                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                <path
                                                    d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM175 208.1L222.1 255.1L175 303C165.7 312.4 165.7 327.6 175 336.1C184.4 346.3 199.6 346.3 208.1 336.1L255.1 289.9L303 336.1C312.4 346.3 327.6 346.3 336.1 336.1C346.3 327.6 346.3 312.4 336.1 303L289.9 255.1L336.1 208.1C346.3 199.6 346.3 184.4 336.1 175C327.6 165.7 312.4 165.7 303 175L255.1 222.1L208.1 175C199.6 165.7 184.4 165.7 175 175C165.7 184.4 165.7 199.6 175 208.1V208.1z"/>
                                            </svg>
                                        @endif
                                    @endif
                                    Question {{$index+1}}</button>

                            @endforeach
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        @foreach($exam->questions as $index=>$question)
                            <div class="tab-pane fade {{$index == 0 ? 'active show':''}}" id="q_{{$index}}"
                                 role="tabpanel" aria-labelledby="nav-home-tab">
                                <p>{{$question->question}}:</p>
                                @foreach($question->options as $option)
                                    <div class="form-check ">
                                        <input required class="form-check-input" type="radio"
                                               name="option[{{$question->id}}]"
                                               {{$exam->authSubmit()->first() ? 'disabled' :''}}
                                               {{$exam->authSubmit()->first() &&  $exam->authSubmit()->first()->optionIDQuestion($question->id) == $option->id ? 'checked':''}}
                                               id="inlineRadio1{{$option->id}}" value="{{$option->id}}">
                                        <label class="form-check-label"
                                               for="inlineRadio1{{$option->id}}">{{$option->option}}</label>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach

                    </div>

                    @if(!$exam->authSubmit()->first())
                        <div class="mt-3">
                            <button type="button" id="previous" style="display: none" class="btn btn-info"><i
                                    class="fa fa-arrow-left me-2"></i>Previous
                            </button>
                            <button type="button" id="next" class="btn btn-success">Next<i
                                    class="fa fa-arrow-right ms-2"></i>
                            </button>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                </form>
            @endif

        </div>
    </div>

    @section('scripts')
        <script>
            $('#next').on('click', function () {
                let activeLink = $('.nav-tabs .nav-link.active');
                let nextLink = activeLink.next();
                activeLink.removeClass('active');
                nextLink.addClass('active');
                let currentTab = activeLink.data('bs-target');
                let nextTab = nextLink.data('bs-target');
                $(currentTab).removeClass('active')
                $(currentTab).removeClass('show');
                $(nextTab).addClass('active');
                $(nextTab).addClass('show');

                if (nextLink.next().length == 0) {
                    $(this).hide();
                }


                $('#previous').show();


            });


            $('#previous').on('click', function () {
                let activeLink = $('.nav-tabs .nav-link.active');
                let previousLink = activeLink.prev();
                activeLink.removeClass('active');
                previousLink.addClass('active');
                let currentTab = activeLink.data('bs-target');
                let previousTab = previousLink.data('bs-target');
                $(currentTab).removeClass('active')
                $(currentTab).removeClass('show');
                $(previousTab).addClass('active');
                $(previousTab).addClass('show');

                if (previousLink.prev().length == 0) {
                    $(this).hide();
                }
                $('#next').show();

            });

        </script>
    @endsection
</x-front-layout>
