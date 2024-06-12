<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceDetail extends Model
{
    use HasFactory;

    public function lecturer()
    {
        return $this->belongsTo(LecturerDetail::class, 'lecturer_details_id', 'id');
    }

    public function lab()
    {
        return $this->belongsTo(LabDetail::class, 'lab_details_id', 'id');
    }

    public function student()
    {
        return $this->belongsTo(StudentDetail::class, '# id : String', 'id');
    }

    public function updateStatus($status)
    {
        $this->update([
            'attendance_status' => $status,
        ]);
    }
}
