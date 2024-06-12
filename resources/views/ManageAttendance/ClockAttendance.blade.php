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
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Student Name</th>
                                    <th>Lecturer Name</th>
                                    <th>Lab Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pendingAttendance as $index => $attendance)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ optional($attendance->student->user)->username }}</td>
                                        <td>{{ optional($attendance->lecturer->user)->username }}</td>
                                        <td>{{ optional($attendance->lab)->lab_name }}</td>
                                        <td>{{ $attendance->attendance_status }}</td>
                                        <td>
                                            <form action="{{ route('ManageAttendance.UpdateStatus') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="attendanceId" value="{{ $attendance->attendance_ID }}">
                                                <select name="newStatus">
                                                    <option value="Present">Present</option>
                                                    <option value="Absent">Absent</option>
                                                </select>
                                                <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                            </form>
                                        </td>
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
