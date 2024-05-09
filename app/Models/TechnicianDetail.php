<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnicianDetail extends Model
{
    use HasFactory;
    protected $fillable = ['user_ID','staff_ID','areaofexpertise'];
    protected $primaryKey = "technician_ID";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_ID'); // Assuming 'user_ID' is the foreign key in the vendors table
    }
}
