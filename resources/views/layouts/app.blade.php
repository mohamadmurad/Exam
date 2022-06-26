<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nucleo-svg.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/argon-dashboard.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    @livewireStyles
</head>
<body class="g-sidenav-show   bg-gray-100">
<div class="min-height-300 bg-primary position-absolute w-100"></div>
@include('layouts.aside')

<!-- Page Content -->
<main class="main-content position-relative border-radius-lg ">
    @include('layouts.nav')
    <div class="container-fluid py-4">

        {{ $slot }}


    </div>


</main>

<!--   Core JS Files   -->
<script src=" {{asset('assets/js/jquery.min.js')}}"></script>
<script src=" {{asset('assets/js/fancybox.umd.js')}}"></script>
<script src=" {{asset('assets/js/core/popper.min.js')}}"></script>
<script src=" {{asset('assets/js/core/bootstrap.min.js')}}"></script>
<script src=" {{asset('assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src=" {{asset('assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
<script src=" {{asset('assets/js/plugins/chartjs.min.js')}}"></script>
<script src=" {{asset('assets/js/sweetalert2@11.js')}}"></script>
<script src=" {{asset('assets/js/moment.min.js')}}"></script>
<script src=" {{asset('assets/js/daterangepicker.js')}}"></script>
<script src=" {{asset('assets/js/toastr.js')}}"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('assets/js/argon-dashboard.min.js?v=2.0.1')}}"></script>
<script src="{{asset('js/index.bundle.min.js')}}"></script>
@include('layouts.scripts')


<script>

    $(document).ready(function () {
        toastr.options.timeOut = 10000;
        @if (Session::has('error'))
        toastr.error('{{ Session::get('error') }}');
        @endif
        @if(Session::has('success'))
        toastr.success('{{ Session::get('success') }}');
        @endif
        @if(Session::has('info'))
        toastr.info('{{ Session::get('info') }}');
        @endif
    });


</script>
<script id="questions_template" type="text/template">

    <div class="question accordion-item card my-3" id="q_<%= id %>">
        <h2 class="card-header p-0 d-flex justify-content-center align-items-center" id="heading_<%= id %>">
            <button class="accordion-button text-bold collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse_<%= id %>" aria-expanded="false" aria-controls="collapse_<%= id %>">
                Question <%= id %>
            </button>
            <button type="button" class="btn btn-link m-0 text-danger delQ" onclick="delQ(this,event)"
                    data-id="<%= id %>"><i class="fa fa-trash"></i></button>
        </h2>
        <div id="collapse_<%= id %>" class="accordion-collapse collapse" aria-labelledby="heading_<%= id %>"
             data-bs-parent="#accordionExample">
            <div class="accordion-body card-body ">

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Question</label>
                        <input class="form-control"  type="text" name="questions[<%= id %>]" required
                               value="{{old('questions')}}"
                        >
                    </div>
                </div>
                <div class="" id="multiple-choice_<%= id %>">


                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="radio" name="option_correct[<%= id %>]" value="1"
                                       id="<%= id %>_option_1_correct" required>
                                <label class="form-check-label" for="<%= id %>_option_1_correct">Correct?</label>
                            </div>

                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <input class="form-control" type="text"
                                       name="options[<%= id %>][1]" value="{{old('options[0]')}}" autocomplete="subject"
                                       placeholder="Option 1" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="radio" name="option_correct[<%= id %>]" value="2"
                                       id="<%= id %>_option_2_correct" required>
                                <label class="form-check-label" for="<%= id %>_option_2_correct">Correct?</label>
                            </div>

                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <input class="form-control" type="text"
                                       name="options[<%= id %>][2]" value="{{old('option_2')}}" autocomplete="subject"
                                       placeholder="Option 2" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="radio" name="option_correct[<%= id %>]" value="3"
                                       id="<%= id %>_option_3_correct" required>
                                <label class="form-check-label" for="<%= id %>_option_3_correct">Correct?</label>
                            </div>

                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <input class="form-control" type="text"
                                       name="options[<%= id %>][3]" value="{{old('option_3')}}" autocomplete="subject"
                                       placeholder="Option 3" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="radio" name="option_correct[<%= id %>]" value="4"
                                       id="<%= id %>_option_4_correct" required>
                                <label class="form-check-label" for="<%= id %>_option_4_correct">Correct?</label>
                            </div>

                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <input class="form-control" type="text"
                                       name="options[<%= id %>][4]" value="{{old('option_4')}}" autocomplete="subject"
                                       placeholder="Option 4" required>
                            </div>
                        </div>
                    </div>


                </div>


            </div>
        </div>

    </div>


</script>
@livewireScripts
@yield('scripts')


</body>
</html>
