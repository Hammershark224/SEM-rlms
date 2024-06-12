<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplaintDetail extends Model
{
    use HasFactory;
    Protected $primaryKey = 'complaint_ID';
    protected $fillable = ['name', 'complaint_type', 'complaint_description', 'complaint_status', 'user_ID', 'image_path'];

}
