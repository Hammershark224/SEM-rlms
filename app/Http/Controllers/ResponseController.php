<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ComplaintDetail;

class ResponseController extends Controller
{
    public function index(){

        $complaints = ComplaintDetail::all(); // Fetch all records from the ComplaintDetail model
        return view("ManageResponse.Response", ['complaints' => $complaints]);
    }
}