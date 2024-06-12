<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AttendanceDetail;
use App\Models\LecturerDetail;
use App\Models\LabDetail;

class AttendanceController extends Controller
{
    public function index()
    {
        return view('ManageAttendance.index'); // Assuming your view file is named 'index.blade.php' inside the 'ManageAttendance' folder
    }
    public function view()
    {
        return view('ManageAttendance.ViewAttendance');
    }

    public function clock()
    {
        return view('ManageAttendance.ClockAttendance');
    }

    public function update()
    {
        return view('ManageAttendance.UpdateAttendance');
    }

    public function record()
    {
        return view('ManageAttendance.RecordAttendance');
    }

    // AttendanceController.php

    public function viewAttendance(Request $request)
    {
        // Fetch data from the database using Eloquent
        $attendanceData = AttendanceDetail::with(['student.user', 'lecturer.user', 'lab'])
            ->when($request->has('labName'), function ($query) use ($request) {
                $query->whereHas('lab', function ($labQuery) use ($request) {
                    $labQuery->where('lab_name', 'like', '%' . $request->input('labName') . '%');
                });
            })
            ->get();

        return view('ManageAttendance.ViewAttendance', compact('attendanceData'));
    }

    public function viewClockAttendance(Request $request)
    {
        // Fetch data from the database using Eloquent, filtering by 'Pending' status
        $pendingAttendance = AttendanceDetail::with(['student.user', 'lecturer.user', 'lab'])
            ->where('attendance_status', 'Pending')
            ->get();

        return view('ManageAttendance.ClockAttendance', compact('pendingAttendance'));
    }

    public function updateAttendanceStatus(Request $request)
    {
        // Validate the request data here
        $request->validate([
            'attendanceId' => 'required|exists:attendance_details,attendance_ID',
            'newStatus' => 'required|in:Present,Absent'
        ]);

        $attendanceId = $request->input('attendanceId');
        $newStatus = $request->input('newStatus');

        // Find the attendance record by ID
        $attendance = AttendanceDetail::find($attendanceId);

        if ($attendance) {
            // Update the status
            $attendance->attendance_status = $newStatus;
            $attendance->save();
        }

        // Redirect back or to a different page
        return redirect()->route('ManageAttendance.ClockAttendance');
    }

    public function viewUpdateAttendance(Request $request)
    {
        $attendanceData = AttendanceDetail::where('attendance_status', '!=', '')->get();
        return view('ManageAttendance.UpdateAttendance', compact('attendanceData'));
    }

    public function updateAttendance(Request $request)
    {
        $request->validate([
            'updateId' => 'required|numeric',
            'updateAction' => 'required|in:Present,Absent',
        ]);

        $attendance = AttendanceDetail::find($request->updateId);

        if ($attendance) {
            $attendance->attendance_status = $request->updateAction;
            $attendance->save();
            return redirect()->back()->with('success', 'Attendance updated successfully.');
        }

        return redirect()->back()->with('error', 'Invalid attendance ID.');
    }

    public function recordAttendance(Request $request)
    {
        // Assuming you want to fetch attendance details along with student and lab information
        $attendanceData = AttendanceDetail::with(['student', 'lab'])
            ->where('attendance_status', '!=', '')
            ->get();

        return view('ManageAttendance.RecordAttendance', compact('attendanceData'));
    }
}
