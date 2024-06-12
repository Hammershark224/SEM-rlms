<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetDetail extends Model
{
    use HasFactory;

    protected $table = 'asset_details';
    protected $primaryKey = 'asset_ID';

    protected $fillable = ['asset_ID', 'lab_name', 'asset_name', 'asset_status', 'quantity'];
}
