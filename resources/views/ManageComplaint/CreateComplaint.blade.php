@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Create Complaint'])

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form role="form" method="post" action="{{ route('ManageComplaint.submit-complaint') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Add Complaint</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Full Name</label>
                                        <input class="form-control" type="text" name="name" required>
                                    </div>
                                </div>
                                <div class="col-sm-6" style="margin-bottom: 20px;">
                                    <label for="inputName5" class="form-label">Complaint Type</label>
                                    <select class="form-select" name="complaint_type" id="complainttype" aria-label="Default select example" required>
                                        <option selected disabled value="" required>Select</option>
                                        <option value="Lab">Lab</option>
                                        <option value="Asset">Asset</option>
                                        <option value="Booking">Booking</option>
                                    </select>
                                </div>
                                <div class="form-group" style="margin-bottom: 20px;">
                                    <label class="col-sm-4 col-sm-2 control-label">Complaint Details (max 2000 words)</label>
                                    <div class="col-sm-6">
                                        <textarea name="complaint_description" required cols="10" rows="10" class="form-control" maxlength="2000"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12" style="margin-bottom: 20px;">
                                    <div class="form-group">
                                        <label for="image" class="form-control-label">Upload Image</label>
                                        <input class="form-control" type="file" name="image" id="image">
                                    </div>
                                </div>
                                <div style="margin-top: 20px;">
                                    <button style="background-color: #007bff; color: #fff; padding: 10px 15px; border: none; cursor: pointer; border-radius: 5px; margin-left:0px">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
