@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Table update'])
    
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form role="form" method="POST" action="{{ route('ManageLabAsset.update', ['assetDetails' => $assetDetail->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Edit Table Assets</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Lab Name</label>
                                        <input class="form-control" type="text" name="lab_name" value="{{ old('lab_name', $assetDetail->lab_name) }}">
                                    </div>
                                </div>   
                                <div class="col-sm-6" style="margin-bottom: 20px;">
                                    <label for="inputName5" class="form-label">Asset Status</label>
                                    <select class="form-select" name="asset_status" id="assetstatus" aria-label="Default select example">
                                        <option>Select</option>
                                        <option value="New" {{ old('asset_status', $assetDetail->asset_status) == 'New' ? 'selected' : '' }}>New</option>
                                        <option value="Repaired" {{ old('asset_status', $assetDetail->asset_status) == 'Repaired' ? 'selected' : '' }}>Repaired</option>
                                        <option value="Disposed" {{ old('asset_status', $assetDetail->asset_status) == 'Disposed' ? 'selected' : '' }}>Disposed</option>
                                    </select>
                                </div>
                                <div style="margin-top: 20px;">
                                    <button style="background-color: #007bff; color: #fff; padding: 10px 15px; border: none; cursor: pointer; border-radius: 5px; margin-left: 0px">Update</button>
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