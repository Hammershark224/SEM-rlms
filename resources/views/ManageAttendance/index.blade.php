@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Tables'])
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between pb-0">
                    <h6>Attendance Lab</h6>
                </div>
                <div class="card-body px-3 pt-3 pb-2">
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('ManageAttendance.ViewAttendance') }}"
                            class="btn btn-primary btn-block">View</a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('ManageAttendance.ClockAttendance') }}"
                            class="btn btn-success btn-block">Clock</a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('ManageAttendance.UpdateAttendance') }}"
                            class="btn btn-warning btn-block">Update</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footers.auth.footer')
</div>
@endsection