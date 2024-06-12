<!-- resources/views/ManageAttendance/viewUpdateAttendance.blade.php -->

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
                        <!-- Form for updating attendance -->
                        <form action="{{ route('ManageAttendance.UpdateAttendance') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="updateId">Update ID:</label>
                                    <input type="text" class="form-control" id="updateId" name="updateId"
                                        value="{{ old('updateId') }}" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="updateAction">Select Action:</label>
                                    <select class="form-control" id="updateAction" name="updateAction" required>
                                        <option value="Present">Present</option>
                                        <option value="Absent">Absent</option>
                                    </select>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <button type="submit" class="btn btn-primary btn-block">Update Attendance</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name Lecture</th>
                                    <th>Name Lab</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attendanceData as $attendance)
                                @if (in_array($attendance->attendance_status, ['attend', 'absent']))
                                <tr>
                                    <td>{{ $attendance->id }}</td>
                                    <td>{{ optional($attendance->lecturer)->name }}</td>
                                    <td>{{ optional($attendance->lab)->lab_name }}</td>
                                    <td>{{ $attendance->attendance_status }}</td>
                                </tr>
                                @endif
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