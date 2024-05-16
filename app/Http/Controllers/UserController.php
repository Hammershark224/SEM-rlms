<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentDetail;
use App\Models\LecturerDetail;
use App\Models\TechnicianDetail;
use App\Models\SystemAdministrationDetail;
use App\Models\User;
class UserController extends Controller
{
    //
    public function index() {
        $dataUser = User::all();
        return view('UserManagement.UserManage',['dataUser'=>$dataUser]);
    }

    public function create() {
        return view('UserManagement.CreateUser');
    }
    
    public function store(Request $request){

        $user = User::create($request->all());
    
        switch ($user->role) {
            case 'student':
                $student = $user->student()->create([
                    'matric_ID' => $request->input('matric_ID'),  // Use request to get form data
                    'program' => $request->input('program'),
                ]);
                break;
    
            case 'technical':
                $technical = $user->technical()->create([
                    'staff_ID' => $request->input('staff_ID'),
                    'areaofexpertise' => $request->input('areaofexpertise'),
                ]);
                break;
    
            case 'lecturer':
                $lecturer = $user->lecturer()->create([
                    'staff_ID' => $request->input('staff_ID'),
                    'program' => $request->input('program'),
                ]);
                break;
    
            case 'admin':
                $admin = $user->admin()->create([
                    'staff_ID' => $request->input('staff_ID'),
                    'position' => $request->input('position'),
                ]);
                break;
        }
        return redirect(route('user.manage'))->with('success','New Data Insert');
    }
    
    public function show($id)
    {
        $dataUser = User::find($id);

        $userRole = $dataUser->role;
    
        switch ($userRole) {
            case 'student':
                $userData = $dataUser->student;
                break;
    
            case 'technical':
                $userData = $dataUser->technical;
                break;
    
            case 'lecturer':
                $userData = $dataUser->lecturer;
                break;
    
            case 'admin':
                $userData = $dataUser->admin;
                break;
        }
    
        return view('UserManagement.ViewUser', ['dataUser' => $dataUser, 'userData' => $userData]);
    }

    public function edit($id){
        $dataUser = User::find($id);

        $userRole = $dataUser->role;
    
        switch ($userRole) {
            case 'student':
                $userData = $dataUser->student;
                break;
    
            case 'technical':
                $userData = $dataUser->technical;
                break;
    
            case 'lecturer':
                $userData = $dataUser->lecturer;
                break;
    
            case 'admin':
                $userData = $dataUser->admin;
                break;
        }
    
        return view('UserManagement.EditUser', ['dataUser' => $dataUser, 'userData' => $userData]);
    }

    public function update(Request $request, $id){
        $dataUser = User::find($id);
    
        // Update the user data
        $dataUser->update($request->all());
    
        // Update related records based on the role
        switch ($dataUser->role) {
            case 'student':
                if ($dataUser->student) {
                    $dataUser->student->update([
                        'matric_ID' => $request->input('matric_ID'),
                        'program' => $request->input('program'),
                    ]);
                }
                break;
    
            case 'technical':
                if ($dataUser->technical) {
                    $dataUser->technical->update([
                        'staff_ID' => $request->input('staff_ID'),
                        'areaofexpertise' => $request->input('areaofexpertise'),
                    ]);
                }
                break;
    
            case 'lecturer':
                if ($dataUser->lecturer) {
                    $dataUser->lecturer->update([
                        'staff_ID' => $request->input('staff_ID'),
                        'program' => $request->input('program'),
                    ]);
                }
                break;
    
            case 'admin':
                if ($dataUser->admin) {
                    $dataUser->admin->update([
                        'staff_ID' => $request->input('staff_ID'),
                        'position' => $request->input('position'),
                    ]);
                }
                break;
        }
    
        return redirect(route('user.manage'))->with('success', 'Data Successfully Updated');
    }
    

    public function delete(Request $request, $id){
        $dataUser = User::find($id);
    
        // Store the role before deleting the user
        $userRole = $dataUser->role;
    
        // Delete related records based on the role
        switch ($userRole) {
            case 'student':
                if ($dataUser->student) {
                    $dataUser->student->delete();
                }
                break;
    
            case 'technical':
                if ($dataUser->technical) {
                    $dataUser->technical->delete();
                }
                break;
    
            case 'lecturer':
                if ($dataUser->lecturer) {
                    $dataUser->lecturer->delete();
                }
                break;
    
            case 'admin':
                if ($dataUser->admin) {
                    $dataUser->admin->delete();
                }
                break;
        }
    
        // Delete the user
        $dataUser->delete();
    
        return redirect(route('user.manage'))->with('success','Data Successfully Deleted');
    }
    
    
}
