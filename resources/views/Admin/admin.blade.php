@extends('Admin.admin-dashboard-layout')

@section('content')

    <div class="container-fluid mt-3">
        <div class="card w-100">


            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        Admin Details
                    </div>
                    <!-- <div class="col-md-6 text-right">
                        <a href="{{route('admin-add')}}" class="btn btn-primary">Add New Admin</a>
                    </div> -->
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Gender</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($admins as $key=>$admin)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$admin->a_id}}</td>
                                <td>{{$admin->a_name}}</td>
                                <td>{{$admin->a_address}}</td>
                                <td>{{$admin->email}}</td>
                                <td>{{$admin->phone}}</td>
                                <td>{{$admin->gender}}</td>
                                <td>{{$admin->status}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#adminModal-{{$admin->id}}"><i class="fa-regular fa-eye"
                                            title="View"></i></button>

                                    <a href="{{url('/admin-update', $admin->id)}}" class="btn btn-warning">
                                    <i class="fa-solid fa-pen-to-square" title="Edit"></i></a>
                                   
                                    <!-- <button type="button" class="btn btn-danger delete-employee"
                                        value=""><i class="fa-solid fa-trash-can"></i></button> -->
                                </td>
                            </tr>
                            <!-- Modal -->
                        <div class="modal fade" id="adminModal-{{$admin->id}}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title fs-5" id="staticBackdropLabel">Admin Details</h5>
                                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                    </div>
                                    <div class="modal-body">

                                        <p>Admin ID: {{$admin->a_id}}</p>
                                        <p>Admin Name: {{$admin->a_name}}</p>
                                        <p>Admin Address: {{$admin->a_address}}</p>
                                        <p>Admin Email: {{$admin->email}}</p>
                                        <p>Admin Phone: {{$admin->phone}}</p>
                                        <p>Admin Gender: {{$admin->gender}}</p>
                                        <p>Admin Status: {{$admin->status}}</p>
                                        <p>Admin DOB: {{$admin->doa}}</p>
                                        <p>Admin DOA: {{$admin->dob}}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <!-- <button type="button" class="btn btn-primary">Understood</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
