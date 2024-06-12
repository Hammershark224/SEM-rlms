<!-- resources/views/ManageAttendance/UpdateStatus.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Attendance Status</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('ManageAttendance.UpdateStatus') }}">
                        @csrf
                        <div class="form-group">
                            <label for="attendanceId">Attendance ID:</label>
                            <input type="text" id="attendanceId" name="attendanceId" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="newStatus">New Status:</label>
                            <select id="newStatus" name="newStatus" class="form-control" required>
                                <option value="Present">Present</option>
                                <option value="Absent">Absent</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Status</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection