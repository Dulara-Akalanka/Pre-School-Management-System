@extends('Coordinator.coordinator-dashboard')

@section('content')

    <div class="container-fluid mt-3">
        <div class="card w-100">


            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                    Coordinator Details
                    </div>
                    
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
                                <th>Image</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>gender</th>
                                <th>Action</th>
                            </tr>
                        </thead>               

                        <tbody>
                            @foreach($coordinators as $key=>$coordinator)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$coordinator->c_id}}</td>
                                <td>{{$coordinator->c_name}}</td>
                                <td>
                                <img src="{{asset('storage/coordinator-images/'.$coordinator->image_name)}}" height="100" width="100" />
                                </td>
                                <td>{{$coordinator->c_address}}</td>
                                <td>{{$coordinator->email}}</td>
                                <td>{{$coordinator->phone}}</td>
                                <td>{{$coordinator->gender}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#coordinatorModal-{{$coordinator->id}}"><i class="fa-regular fa-eye"
                                            title="View"></i></button>

                                    <!-- <a href="{{url('/coordinator-update', $coordinator->id)}}" class="btn btn-warning">
                                    <i class="fa-solid fa-pen-to-square" title="Edit"></i></a>
                                    
                                   
                                    <button type="button" class="btn btn-danger delete-coordinator" value="{{$coordinator->id}}">
                                    <i class="fa-solid fa-trash-can" title="Delete"></i></button> -->
                                </td>
                            </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="coordinatorModal-{{$coordinator->id}}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title fs-5" id="staticBackdropLabel">Coordinator Details</h5>
                                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                    </div>
                                    <div class="modal-body">
                                    
                                        <p>Coordinator ID: {{$coordinator->c_id}}</p>
                                        <p>Coordinator Name: {{$coordinator->c_name}}</p>
                                        <p>Coordinator Address: {{$coordinator->c_address}}</p>
                                        <p>Coordinator Email: {{$coordinator->email}}</p>
                                        <p>Coordinator Phone: {{$coordinator->phone}}</p>
                                        <p>Coordinator Gender: {{$coordinator->gender}}</p>
                                        <p>Coordinator Status: {{$coordinator->status}}</p>
                                        <p>Coordinator DOB: {{$coordinator->doa}}</p>
                                        <p>Coordinator DOA: {{$coordinator->dob}}</p>
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

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

        $('body').on('click', '.delete-coordinator', function() {
    var CoordinatorID = $(this).val();
    Swal.fire({
        title: 'Are you sure?',
        text: "You can change this later.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Delete it',
        customClass: {
            confirmButton: 'btn btn-danger',
            cancelButton: 'btn btn-outline-danger ml-1'
        },
        buttonsStyling: false
    }).then(function(result) {
        console.log(result);
        if (result.value) {
            window.location.href = "{{ url('delete-coordinator') }}/" + CoordinatorID;
        }
    });
});



                                    
$(".alert").fadeTo(2000, 500).slideUp(500, function(){
            $(".alert").slideUp(500);
        });
    </script>
  
    

@endsection
