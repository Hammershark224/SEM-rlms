<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ComplaintDetail;
use App\Models\StudentDetail;
use Illuminate\Support\Facades\Auth;
class ComplaintController extends Controller
{
    public function index(){
        $complaints = ComplaintDetail::all(); // Fetch all records from the ComplaintDetail model
        return view("ManageComplaint.Complaint", ['complaints' => $complaints]);
    }

    public function create (){
        return view("ManageComplaint.CreateComplaint");

    }

    public function store(Request $request)
{
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'complaint_type' => 'required|string',
            'complaint_description' => 'required|string|max:2000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $complaintDetail = new ComplaintDetail();
        $complaintDetail->user_ID = Auth::user()->user_ID;
        $complaintDetail->name = $request->input('name');
        $complaintDetail->complaint_type = $request->input('complaint_type');
        $complaintDetail->complaint_description = $request->input('complaint_description');
        $complaintDetail->complaint_status = 'not completed';
    
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $complaintDetail->image_path = 'images/'.$imageName;
        }
    
        $complaintDetail->save();
    
        // Redirect back or wherever you want after successful submission
        return redirect()->route('ManageComplaint.Complaint')->with('success', 'Complaint submitted successfully!');
}
     
    
    public function edit($complaint)
{
    $complaint = ComplaintDetail::find($complaint);
    return view('ManageComplaint.EditComplaint', ['complaint' => $complaint]);
}

public function update(Request $request, $complaint)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'complaint_type' => 'required|string',
        'complaint_description' => 'required|string|max:2000',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $complaintDetail = ComplaintDetail::find($complaint);
    $complaintDetail->name = $request->input('name');
    $complaintDetail->complaint_type = $request->input('complaint_type');
    $complaintDetail->complaint_description = $request->input('complaint_description');

    if ($request->hasFile('image')) {
        // Delete the old image if it exists
        if ($complaintDetail->image_path && file_exists(public_path($complaintDetail->image_path))) {
            unlink(public_path($complaintDetail->image_path));
        }

        // Store the new image
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $complaintDetail->image_path = 'images/'.$imageName;
    }

    $complaintDetail->save();

    return redirect()->route('ManageComplaint.Complaint')->with('success', 'Complaint updated successfully');
}



    public function destroy(ComplaintDetail $complaint)
    {
         $complaint->delete();

    return redirect()->route('ManageComplaint.Complaint')->with('success', 'Complaint deleted successfully!');
    }

}