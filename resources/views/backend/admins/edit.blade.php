<x-app-layout>



    <div @class('row')>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Create Admin</p>

                    </div>
                </div>
                <div class="card-body">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors"/>
                    <form method="post" action="{{route('backend.admins.update',$admin)}}">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Name</label>
                                    <input class="form-control" type="text" name="name"
                                           value="{{$admin->name}}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">email</label>
                                    <input class="form-control" type="email" name="email" value="{{$admin->email}}"
                                    >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">password</label>
                                    <input class="form-control" type="password" name="password"
                                    >
                                    <small>if you don't need to change password, don't fill this filed</small>

                                </div>
                            </div>



                            <div class="col-md-6">
                                <button type="submit" @class('btn btn-success') >update</button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script>
            birthdate.daterangepicker({
                startDate: "{{\Illuminate\Support\Carbon::make($admin->birthDate) ? \Illuminate\Support\Carbon::make($admin->birthDate)->format('d/m/y') : '01/01/1999' }}",
                //  autoUpdateInput: false,
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'), 10)
            });
        </script>
    @endsection

</x-app-layout>
