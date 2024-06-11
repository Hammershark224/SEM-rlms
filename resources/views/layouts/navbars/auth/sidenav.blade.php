@php
    $role = Auth::user()->role;
@endphp

<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('home') }}" target="_blank">
            <img src="{{ asset('img/FKKMS favicon.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">RLMS</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <!-- dashboard side nav -->
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" href="{{ route('home') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            @if ($role == "student")
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'userprofile' ? 'active' : '' }}" href="{{ route('userprofile') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">User Profile</span>
                </a>
                <a class="nav-link {{ Route::currentRouteName() == 'show-report' ? 'active' : '' }}" href="#">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-calendar-grid-58 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Attendance</span>
                </a>
                <a class="nav-link {{ Route::currentRouteName() == 'show-report' ? 'active' : '' }}" href="#">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-archive-2 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Lab Booking</span>
                </a>
                <a class="nav-link {{ Route::currentRouteName() == 'show-report' ? 'active' : '' }}" href="#">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-email-83 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Complaint</span>
                </a>
            </li>
            @endif

            @if ($role == "admin")
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-user-check text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">User Management</span>
                </a>
                <div class="collapse" id="collapseExample">
                    <ul class="navbar-nav ms-3">
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() == 'ingredient' ? 'active' : '' }}" href="{{ route('user.manage', 'admin') }}">
                                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-user-tie text-dark text-sm opacity-10"></i>
                                </div>
                                <span class="nav-link-text ms-1">Administrators List</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() == 'ingredient.manage' ? 'active' : '' }}" href="{{ route('user.manage', 'technical') }}">
                                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-tools text-dark text-sm opacity-10"></i>
                                </div>
                                <span class="nav-link-text ms-1">Technicians List</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() == 'ingredient.manage' ? 'active' : '' }}" href="{{ route('user.manage', 'lecturer') }}">
                                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-chalkboard-teacher text-dark text-sm opacity-10"></i>
                                </div>
                                <span class="nav-link-text ms-1">Lecturers List</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() == 'ingredient.manage' ? 'active' : '' }}" href="{{ route('user.manage', 'student') }}">
                                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-user-graduate text-dark text-sm opacity-10"></i>
                                </div>
                                <span class="nav-link-text ms-1">Students List</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'userprofile' ? 'active' : '' }}" href="{{ route('userprofile') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-user text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">User Profile</span>
                </a>
                <a class="nav-link {{ str_contains(request()->url(), 'user-management') ? 'active' : '' }}" href="#">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-basket text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Lab Assignment</span>
                </a>
                {{-- <a class="nav-link {{ str_contains(request()->url(), 'user-management') ? 'active' : '' }}" href="">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-basket text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Lab Asset</span>
                </a> --}}
                <a class="nav-link {{ str_contains(request()->url(), 'user-management') ? 'active' : '' }}" href="#">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-calendar-grid-58 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Attendance</span>
                </a>
                <a class="nav-link {{ str_contains(request()->url(), 'ManageComplaint.Complaint') ? 'active' : '' }}" href="{{route('ManageComplaint.Complaint')}}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-email-83 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Complaint & Response</span>
                </a>
                {{-- <a class="nav-link {{ str_contains(request()->url(), 'user-management') ? 'active' : '' }}" href="">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-calendar-grid-58 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Lab Booking</span>
                </a> --}}
            </li>
            @endif

            @if ($role == "technical")
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'userprofile' ? 'active' : '' }}" href="{{ route('userprofile') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">User Profile</span>
                </a>
                <a class="nav-link {{ str_contains(request()->url(), 'tables') ? 'active' : '' }}" href="">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-box-2 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Asset</span>
                </a>
                <a class="nav-link {{ str_contains(request()->url(), 'tables') ? 'active' : '' }}" href="">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-support-16 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Complaints</span>
                </a>
            </li>
            @endif

            @if ($role == "lecturer")
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'userprofile' ? 'active' : '' }}" href="{{ route('userprofile') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">User Profile</span>
                </a>
                <a class="nav-link {{ Route::currentRouteName() == 'show-report' ? 'active' : '' }}" href="#">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-calendar-grid-58 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Attendance Record</span>
                </a>
                <a class="nav-link {{ Route::currentRouteName() == 'show-report' ? 'active' : '' }}" href="#">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-archive-2 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Lab Booking</span>
                </a>
                <a class="nav-link {{ Route::currentRouteName() == 'show-report' ? 'active' : '' }}" href="#">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-email-83 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Complaint</span>
                </a>
            </li>
            @endif
        </ul>
    </div>
</aside>
