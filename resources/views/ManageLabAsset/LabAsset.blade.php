@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Tables'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                <div class="card-header d-flex justify-content-between pb-0">
                    <h6> Display Table Assets</h6>
                    <div class="col-auto">
                        <a class="btn btn-danger" href="{{ route('ManageLabAsset.CreateLabAsset') }} ">ADD</a>
                    </div>
                </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Lab Name </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Asset Name </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Asset Status </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Quantity </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($assets as $asset)
                                    <tr>
                                    <td scope="row" class="text-center text-dark">{{ $asset->lab_name }}</td>
                                    <td scope="row" class="text-center text-dark">{{ $asset->asset_name }}</td>
                                    <td scope="row" class="text-center text-dark">{{ $asset->asset_status }}</td>
                                    <td scope="row" class="text-dark">{{ $asset->quantity }}</td>
                                        <td>
                                            <!-- Edit Button
                                            <a> <button class="btn btn-primary" type="edit "><i class="fa fa-pencil-square-o"></i></button></a>
-->
                        
                                            <!-- Delete Button-->
                                            <form method="post" action="{{ route('assets.destroy', $asset->id) }}" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="delete"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection