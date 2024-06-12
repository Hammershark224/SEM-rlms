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
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
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
                        <i class="ni ni-chart-bar-32 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">User Profile</span>
                </a>
                <a class="nav-link {{ Route::currentRouteName() == 'show-report' ? 'active' : '' }}" href="#">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-chart-bar-32 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Attendance</span>
                </a>
                <a class="nav-link {{ Route::currentRouteName() == 'show-report' ? 'active' : '' }}" href="#">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-chart-bar-32 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Lab Booking</span>
                </a>
                <a class="nav-link {{ Route::currentRouteName() == 'show-report' ? 'active' : '' }}" href="#">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-chart-bar-32 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Complaint</span>
                </a>
            </li>
            @endif

            @if ($role == "admin")
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'userprofile' ? 'active' : '' }}" href="{{ route('userprofile') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-user text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">User Profile</span>
                </a>
                <a class="nav-link {{ Route::currentRouteName() == 'user.manage' ? 'active' : '' }}" href="{{ route('user.manage') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-user-plus text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">User Management</span>
                </a>
                <a class="nav-link {{ str_contains(request()->url(), 'user-management') == true ? 'active' : '' }}" href="#">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-basket text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Lab Assignment</span>
                </a>
                <a class="nav-link {{ str_contains(request()->url(), 'user-management') == true ? 'active' : '' }}" href="{{ route('ManageLabAsset.LabAsset') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-basket text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Lab Asset</span>
                </a>
                <a class="nav-link {{ str_contains(request()->url(), 'user-management') == true ? 'active' : '' }}" href="#">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-basket text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Attendance</span>
                </a>
                <a class="nav-link {{ str_contains(request()->url(), 'ManageComplaint.Complaint') == true ? 'active' : '' }}" href="{{route('ManageComplaint.Complaint')}}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-basket text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Complaint & Response</span>
                </a>
                {{-- <a class="nav-link {{ str_contains(request()->url(), 'user-management') == true ? 'active' : '' }}" href="">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-basket text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Lab Booking</span>
                </a> --}}
            </li>
            @endif

            @if ($role == "technical")
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'userprofile' ? 'active' : '' }}" href="{{ route('userprofile') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-chart-bar-32 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">User Profile</span>
                </a>
                <a class="nav-link {{ str_contains(request()->url(), 'tables') == true ? 'active' : '' }}" href="">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-chat-round text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">asset</span>
                </a>
                <a class="nav-link {{ str_contains(request()->url(), 'tables') == true ? 'active' : '' }}" href="">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-chat-round text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Complaints</span>
                </a>
            </li>
            @endif

            @if ($role == "lecturer")
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'userprofile' ? 'active' : '' }}" href="{{ route('userprofile') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-chart-bar-32 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">User Profile</span>
                </a>
                <a class="nav-link {{ Route::currentRouteName() == 'show-report' ? 'active' : '' }}" href="#">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-chart-bar-32 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Attendance Record</span>
                </a>
                <a class="nav-link {{ Route::currentRouteName() == 'show-report' ? 'active' : '' }}" href="#">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-chart-bar-32 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Lab Booking</span>
                </a>
                <a class="nav-link {{ Route::currentRouteName() == 'show-report' ? 'active' : '' }}" href="#">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-chart-bar-32 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Complaint</span>
                </a>
            </li>
            @endif
        </ul>
    </div>
</aside>
