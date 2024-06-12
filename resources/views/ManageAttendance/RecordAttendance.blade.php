<!-- resources/views/ManageAttendance/RecordAttendance.blade.php -->

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
                    <div class="col-md-12">
                        <form action="{{ route('ManageAttendance.ViewAttendance') }}" method="GET">
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="labName">Search by Lab Name:</label>
                                    <input type="text" class="form-control" id="labName" name="labName"
                                        value="{{ request('labName') }}">
                                </div>
                                <div class="col-md-2 mb-3">
                                    <button type="submit" class="btn btn-primary btn-block">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name Student</th>
                                    <th>Name Lab</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attendanceData as $attendance)
                                <tr>
                                    <td>{{ $attendance->id }}</td>
                                    <td>{{ optional($attendance->student)->name }}</td>
                                    <td>{{ optional($attendance->lab)->lab_name }}</td>
                                    <td>{{ $attendance->attendance_status }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth.footer')
</div>
@endsection