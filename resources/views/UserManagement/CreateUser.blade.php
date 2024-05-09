@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Your Profile'])
    
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form role="form" method="post" action="{{ route('user.store') }}" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Add User</p>
                                <button type="submit" class="btn btn-primary btn-sm ms-auto">Add</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Full  Name</label>
                                        <input class="form-control" type="text" name="username">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Contact No. </label>
                                        <input class="form-control" type="number" name="phone_num">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Email address</label>
                                        <input class="form-control" type="email" name="email">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="inputPassword5" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password">
                                </div>     

                                <div class="col-sm-6">
                                    <label for="inputName5" class="form-label">Gender</label>
                                    <select class="form-select" name="gender" aria-label="Default select example">
                                        <option selected>Select...</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>

                                <div class="col-sm-12">
                                    <label for="inputName5" class="form-label">User Group</label>
                                    <select class="form-select" name="role" id="usergroup" aria-label="Default select example">
                                        <option selected>Select...</option>
                                        <option value="admin">System Administration</option>
                                        <option value="lecturer">Lecturer</option>
                                        <option value="student">Student</option>
                                        <option value="technical">Technician Team</option>
                                    </select>
                                </div>

                                <div class="col-md-6" id="staffField" style="display: none;">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Staff ID </label>
                                        <input class="form-control" type="text" name="staff_ID">
                                    </div>
                                </div>

                                <div class="col-md-6" id="studentField" style="display: none;">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Matric ID </label>
                                        <input class="form-control" type="text" name="matric_ID">
                                    </div>
                                </div>

                                <div class="col-sm-6" id="programField" style="display: none;">
                                    <label for="inputName5" class="form-label">Program</label>
                                    <select class="form-select" name="program" aria-label="Default select example">
                                        <option selected>Select...</option>
                                        <option value="Master of Science in Digital Transformation">Master of Science in Digital Transformation</option>
                                        <option value="Master of Science in Artificial Intelligence">Master of Science in Artificial Intelligence</option>
                                        <option value="Master of Science in Cyber Security">Master of Science in Cyber Security</option>
                                    </select>
                                </div>

                                <div class="col-sm-6" id="positionField" style="display: none;">
                                    <label for="inputName5" class="form-label">Position</label>
                                    <select class="form-select" name="position" aria-label="Default select example">
                                        <option selected>Select...</option>
                                        <option value="Deputy Dean of Research">Deputy Dean of Research (TDR)</option>
                                        <option value="Head of Research Group">Head of Research Group (HoRG)</option>
                                    </select>
                                </div>

                                <div class="col-sm-6" id="areaofexpertiseField" style="display: none;">
                                    <label for="inputName5" class="form-label">Area of Expertise</label>
                                    <select class="form-select" name="areaofexpertise" aria-label="Default select example">
                                        <option selected>Select...</option>
                                        <option value="Computer IT">Computer IT</option>
                                        <option value="Network">Network</option>
                                        <option value="Software">Software</option>
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

                                        usergroupSelect.addEventListener('change', function () {
                                            if (usergroupSelect.value === 'admin') {
                                                staffField.style.display = 'block';
                                                positionField.style.display = 'block';
                                                areaofexpertiseField.style.display = 'none';
                                                programField.style.display = 'none';
                                                studentField.style.display = 'none';
                                            } 
                                            else if (usergroupSelect.value === 'technical') {
                                                staffField.style.display = 'block';
                                                areaofexpertiseField.style.display = 'block';
                                                studentField.style.display = 'none';
                                                positionField.style.display = 'none';
                                                programField.style.display = 'none';
                                            } 
                                            else if (usergroupSelect.value === 'lecturer') {
                                                staffField.style.display = 'block';
                                                programField.style.display = 'block';
                                                studentField.style.display = 'none';
                                                areaofexpertiseField.style.display = 'none';
                                                positionField.style.display = 'none';
                                            } 
                                            else if (usergroupSelect.value === 'student') {
                                                studentField.style.display = 'block';
                                                programField.style.display = 'block';
                                                staffField.style.display = 'none';
                                                areaofexpertiseField.style.display = 'none';
                                                positionField.style.display = 'none';
                                            } 
                                            else {
                                                staffField.style.display = 'none';
                                                studentField.style.display = 'none';
                                                positionField.style.display = 'none';
                                                areaofexpertiseField.style.display = 'none';
                                                programField.style.display = 'none';

                                            }
                                        });
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
