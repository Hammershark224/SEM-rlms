@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Your Profile'])

    <div id="alert">
        @include('components.alert')
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form role="form" method="POST" action={{ route('profile.update') }} enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Profile</p>
                                <button type="submit" class="btn btn-primary btn-sm ms-auto">Save</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">User Information</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Full Name</label>
                                        <input class="form-control" type="text" name="username" value="{{ old('username', auth()->user()->username) }}" readonly>
                                    </div>
                                </div>
                                @if(auth()->user()->role == "student") 
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Matric ID</label>
                                            <input class="form-control" type="text" name="matric_ID" value="{{ old('matric_ID', auth()->user()->student->matric_ID) }}" readonly>
                                        </div>
                                    </div>
                                @elseif(auth()->user()->role == "technical")
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Staff ID</label>
                                            <input class="form-control" type="text" name="staff_ID" value="{{ old('staff_ID', auth()->user()->technical->staff_ID) }}" readonly>
                                        </div>
                                    </div>
                                @elseif(auth()->user()->role == "admin")
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Staff ID</label>
                                            <input class="form-control" type="text" name="staff_ID" value="{{ old('staff_ID', auth()->user()->admin->staff_ID) }}" readonly>
                                        </div>
                                    </div>
                                @elseif(auth()->user()->role == "lecturer")
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Staff ID</label>
                                            <input class="form-control" type="text" name="staff_ID" value="{{ old('staff_ID', auth()->user()->lecturer->staff_ID) }}" readonly>
                                        </div>
                                    </div>
                                @endif

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Gender</label>
                                        <input class="form-control" type="text" name="gender" value="{{ old('gender', auth()->user()->gender) }}" readonly>
                                    </div>
                                </div>
                                @if(auth()->user()->role == "student") 
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Program</label>
                                            <input class="form-control" type="text" name="program" value="{{ old('program', auth()->user()->student->program) }}" readonly>
                                        </div>
                                    </div>
                                @elseif(auth()->user()->role == "technical")
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Area of Expertise</label>
                                            <input class="form-control" type="text" name="areaofexpertise" value="{{ old('areaofexpertise', auth()->user()->technical->areaofexpertise) }}" readonly>
                                        </div>
                                    </div>
                                @elseif(auth()->user()->role == "admin")
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Position</label>
                                        <input class="form-control" type="text" name="position" value="{{ old('position', auth()->user()->admin->position) }}" readonly>
                                    </div>
                                </div>
                                @elseif(auth()->user()->role == "lecturer")
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Program</label>
                                        <input class="form-control" type="text" name="program" value="{{ old('program', auth()->user()->lecturer->program) }}" readonly>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <hr class="horizontal dark">
                            <p class="text-uppercase text-sm">Contact Information</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Email address</label>
                                        <input class="form-control" type="email" name="email" value="{{ old('email', auth()->user()->email) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Contact Number</label>
                                        <input class="form-control" type="number" name="phone_num" value="{{ old('phone_num', auth()->user()->phone_num) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
