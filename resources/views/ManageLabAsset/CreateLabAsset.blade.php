@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Form'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                <div class="card-header d-flex justify-content-between pb-0">
                    <h6> Add Asset Form</h6>
                </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <form method="post" action="{{ route('ManageLabAsset.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div style="margin-bottom: 15px;margin-left: 50px">
                                <label style="display: block; margin-bottom: 5px;">Lab ID</label>
                                <input type="text" name="lab_name" placeholder="Lab Name" style="width: 80%; padding: 4px;" />
                            </div>
                            <div style="margin-bottom: 15px;margin-left: 50px">
                                <label style="display: block; margin-bottom: 5px;">Asset Name</label>
                                    <select class="form-select" name="asset_name" id="assetname" aria-label="Default select example" style="width: 80%;">
                                        <option selected>Select</option>
                                        <option value="Chair">Chair</option>
                                        <option value="Desk">Desk</option>
                                        <option value="Computer">Computer</option>
                                        <option value="Projector">Projector</option>
                                        <option value="Microphone">Microphone</option>
                                    </select>
                                </div>
                            </div>
                            <div style="margin-bottom: 15px;margin-left: 50px">
                                <label style="display: block; margin-bottom: 5px;">Asset Status</label>
                                    <select class="form-select" name="asset_status" id="assetstatus" aria-label="Default select example" style="width: 80%;">
                                        <option selected>Select</option>
                                        <option value="Broken">Broken</option>
                                        <option value="Repairing">Repairing</option>
                                    </select>
                            </div>
                            <div style="margin-bottom: 15px; margin-left: 50px">
                                <label style="display: block; margin-bottom: 5px;">Quantity</label>
                            <input type="text" name="quantity" placeholder="Quantity" style="width: 80%; padding: 4px;" />
                            </div>
                            <div>
                            <button style="background-color: #007bff; color: #fff; padding: 10px 15px; border: none; cursor: pointer; border-radius: 5px;margin-left: 50px">Save details</button>   
                            <!--<input type="submit" value="Save details" style="background-color: #007bff; color: #fff; padding: 10px 15px; border: none; cursor: pointer; border-radius: 5px;margin-left: 50px" />
                              </div>-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection