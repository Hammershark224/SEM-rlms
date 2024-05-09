@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Your Profile'])
    
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    
                    <form role="form" method="post" action="{{ route('user.manageView') }}" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Add User</p>
                                <button type="submit" class="btn btn-primary btn-sm ms-auto">Back</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Full  Name</label>
                                        <input class="form-control" type="text" name="username" value = "{{$dataUser->username}}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Contact No. </label>
                                        <input class="form-control" type="number" name="phone_num" value = "{{$dataUser->phone_num}}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Email address</label>
                                        <input class="form-control" type="email" name="email" value = "{{$dataUser->email}}" readonly>
                                    </div>
                                </div>  

                                <div class="col-sm-6">
                                    <label for="inputName5" class="form-label">Gender</label>
                                    <select class="form-select" name="gender" aria-label="Default select example" disabled>
                                        <option selected>Select...</option>
                                        <option value="male" @if($dataUser->gender=='male') selected @endif>Male</option>
                                        <option value="female" @if($dataUser->gender=='female') selected @endif>Female</option>
                                    </select>
                                </div>

                                <div class="col-sm-12">
                                    <label for="inputName5" class="form-label">User Group</label>
                                    <select class="form-select" name="role" id="usergroup" aria-label="Default select example" disabled>
                                        <option selected>Select...</option>
                                        <option value="admin" @if($dataUser->role=='admin') selected @endif>System Administration</option>
                                        <option value="lecturer" @if($dataUser->role=='lecturer') selected @endif>Lecturer</option>
                                        <option value="student" @if($dataUser->role=='student') selected @endif>Student</option>
                                        <option value="technical" @if($dataUser->role=='technical') selected @endif>Technician Team</option>
                                    </select>
                                </div>

                                <div class="col-md-6" id="staffField" style="display: none;">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Staff ID </label>
                                        <input class="form-control" type="text" name="staff_ID" value = "{{$userData->staff_ID}}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6" id="studentField" style="display: none;">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Matric ID </label>
                                        <input class="form-control" type="text" name="matric_ID" value = "{{$userData->matric_ID}}" readonly>
                                    </div>
                                </div>

                                <div class="col-sm-6" id="programField" style="display: none;">
                                    <label for="inputName5" class="form-label">Program</label>
                                    <select class="form-select" name="program" aria-label="Default select example" disabled>
                                        <option selected>Select...</option>
                                        <option value="Master of Science in Digital Transformation" @if($userData->program=='Master of Science in Digital Transformation') selected @endif>Master of Science in Digital Transformation</option>
                                        <option value="Master of Science in Artificial Intelligence" @if($userData->program=='Master of Science in Artificial Intelligence') selected @endif>Master of Science in Artificial Intelligence</option>
                                        <option value="Master of Science in Cyber Security" @if($userData->program=='Master of Science in Cyber Security') selected @endif>Master of Science in Cyber Security</option>
                                    </select>
                                </div>

                                <div class="col-sm-6" id="positionField" style="display: none;">
                                    <label for="inputName5" class="form-label">Position</label>
                                    <select class="form-select" name="position" aria-label="Default select example" disabled>
                                        <option selected>Select...</option>
                                        <option value="Deputy Dean of Research" @if($userData->position=='Deputy Dean of Research') selected @endif>Deputy Dean of Research (TDR)</option>
                                        <option value="Head of Research Group" @if($userData->position=='Head of Research Group') selected @endif>Head of Research Group (HoRG)</option>
                                    </select>
                                </div>

                                <div class="col-sm-6" id="areaofexpertiseField" style="display: none;">
                                    <label for="inputName5" class="form-label">Area of Expertise</label>
                                    <select class="form-select" name="areaofexpertise" aria-label="Default select example" disabled>
                                        <option selected>Select...</option>
                                        <option value="Computer IT" @if($userData->areaofexpertise=='Computer IT') selected @endif>Computer IT</option>
                                        <option value="Network" @if($userData->areaofexpertise=='Network') selected @endif>Network</option>
                                        <option value="Software" @if($userData->areaofexpertise=='Software') selected @endif>Software</option>
                                    </select>
                                </div>

                                <script>
                                    document.addEventListener('DOMContentLoaded', function () {
                                        var usergroupSelect = document.getElementById('usergroup');
                                        var staffField = document.getElementById('staffField');
                                        var studentField = document.getElementById('studentField');
                                        var programField = document.getElementById('programField');
                                        var positionField = document.getElementById('positionField');
                                        var areaofexpertiseField = document.getElementById('areaofexpertiseField');

                                        function handleUserGroupChange() {
                                            if (usergroupSelect.value === 'admin') {
                                                staffField.style.display = 'block';
                                                positionField.style.display = 'block';
                                                areaofexpertiseField.style.display = 'none';
                                                programField.style.display = 'none';
                                                studentField.style.display = 'none';
                                            } else if (usergroupSelect.value === 'technical') {
                                                staffField.style.display = 'block';
                                                areaofexpertiseField.style.display = 'block';
                                                studentField.style.display = 'none';
                                                positionField.style.display = 'none';
                                                programField.style.display = 'none';
                                            } else if (usergroupSelect.value === 'lecturer') {
                                                staffField.style.display = 'block';
                                                programField.style.display = 'block';
                                                studentField.style.display = 'none';
                                                areaofexpertiseField.style.display = 'none';
                                                positionField.style.display = 'none';
                                            } else if (usergroupSelect.value === 'student') {
                                                studentField.style.display = 'block';
                                                programField.style.display = 'block';
                                                staffField.style.display = 'none';
                                                areaofexpertiseField.style.display = 'none';
                                                positionField.style.display = 'none';
                                            } else {
                                                staffField.style.display = 'none';
                                                studentField.style.display = 'none';
                                                positionField.style.display = 'none';
                                                areaofexpertiseField.style.display = 'none';
                                                programField.style.display = 'none';
                                            }
                                        }

                                        // Trigger the change event when the DOM is loaded
                                        handleUserGroupChange();

                                        // Add an event listener for the change event
                                        usergroupSelect.addEventListener('change', handleUserGroupChange);
                                    });
                                </script>
                            </div>                    
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection