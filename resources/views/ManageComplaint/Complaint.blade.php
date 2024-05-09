@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Complaint'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                <div class="card-header d-flex justify-content-between pb-0">
                    <h6> Complaint</h6>
                    <div class="col-auto">
                        <a class="btn btn-danger" href="{{route('ManageComplaint.CreateComplaint') }} ">ADD</a>
                    </div>
                </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table table-bordered p-0">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder ">
                                            Complaint ID </th>

                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder  ">
                                            Complaint Type </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder  ps-2">
                                            Complaint Description </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder  ">
                                                 Status </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder  ">
                                                    Time & Date </th>
                                        <th
                                            class=" text-center text-uppercase text-secondary text-xxs font-weight-bolder ">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($complaints as $complaint)
                                    <tr>
                                        <td scope="row" class="text-center text: dark; ">{{ $complaint->id }}</td>
                                        <td scope="row" class="text-center text: dark;  ">{{ $complaint->complaint_type }}</td>
                                        <td scope="row" class="text-center text: dark; ps-2">{{ $complaint->complaint_description }}</td>
                                        <td scope="row" class="text: dark;">{{ $complaint->complaint_status }}</td>
                                        <td scope="row" class="text: dark;">{{ $complaint->created_at }}</td>
                                        <td>
                                            <!-- Edit Button -->
                                            <a href="{{ route('ManageComplaint.EditComplaint', $complaint->id) }}"> <button class="btn btn-primary" type="edit "><i class="fa fa-pencil-square-o"></i></button></a>
                                           
                        
                                            <!-- Delete Button -->
                                            <form method="post" action="{{ route('complaints.destroy', $complaint->id) }}" style="display: inline;">
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