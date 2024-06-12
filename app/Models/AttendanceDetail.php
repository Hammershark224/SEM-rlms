<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceDetail extends Model
{
    use HasFactory;

    protected $table = 'attendance_details'; // Explicitly set the table name

    protected $primaryKey = 'attendance_ID';

    protected $fillable = ['student_ID', 'lecturer_ID', 'lab_ID', 'attendance_status'];

    public function lecturer()
    {
        return $this->belongsTo(LecturerDetail::class, 'lecturer_ID', 'lecturer_ID');
    }

    public function lab()
    {
        return $this->belongsTo(LabDetail::class, 'lab_ID', 'lab_ID');
    }

    public function student()
    {
        return $this->belongsTo(StudentDetail::class, 'student_ID', 'student_ID');
    }

    public function updateStatus($status)
    {
        $this->update([
            'attendance_status' => $status,
        ]);
    }
}