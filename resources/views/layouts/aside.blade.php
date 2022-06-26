<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
       id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
           aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html "
           target="_blank">
            {{--            <img src="./assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">--}}
            <span class="ms-1 font-weight-bold">Exam {{\Illuminate\Support\Facades\Auth::user()->roles[0]->name}}</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('backend.dashboard.index')? 'active': ''}}"
                       href="{{route('backend.dashboard.index')}}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-dashboard text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
            <li class="nav-item">
                <a class="nav-link {{request()->routeIs('backend.admins.*')? 'active': ''}}"
                   href="{{route('backend.admins.index')}}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-lock-open text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Admins</span>
                </a>
            </li>
                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('backend.students.*')? 'active': ''}}"
                       href="{{route('backend.students.index')}}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-users text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">students</span>
                    </a>
                </li>


            <li class="nav-item">
                <a class="nav-link {{request()->routeIs('backend.exams.*')? 'active': ''}}"
                   href="{{route('backend.exams.index')}}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-check text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Exams</span>
                </a>
            </li>


        </ul>
    </div>

</aside>
