@extends('Coordinator.coordinator-dashboard')

@section('content')
<div class="container-fluid mt-3">
        <div class="card w-100">


            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        Teacher Details
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{route('c-teacher-add')}}" class="btn btn-primary">Add New Teacher</a>
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
                                <th>Level</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($teachers as $key=>$teacher)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$teacher->t_id}}</td>
                                <td>{{$teacher->t_name}}</td>
                                <td>
                                <img src="{{asset('storage/teacher-images/'.$teacher->image_name)}}" height="100" width="100" />
                                </td>
                                <td>{{$teacher->t_address}}</td>
                                <td>{{$teacher->email}}</td>
                                <td>{{$teacher->phone}}</td>
                                <td>{{$teacher->gender}}</td>
                                <td>{{$teacher->t_level}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#teacherModal-{{$teacher->id}}"><i class="fa-regular fa-eye"
                                            title="View"></i></button>

                                    <a href="{{url('/c-teacher-update', $teacher->id)}}" class="btn btn-warning">
                                    <i class="fa-solid fa-pen-to-square" title="Edit"></i></a>

                                    <button type="button" class="btn btn-danger delete-teacher" value="{{$teacher->id}}">
                                        <i class="fa-solid fa-trash-can" title="Delete"></i></button>
                                </td>
                            </tr>

                            <!-- Modal -->
                        <div class="modal fade" id="teacherModal-{{$teacher->id}}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title fs-5" id="staticBackdropLabel">Coordinator Details</h5>
                                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                    </div>
                                    <div class="modal-body">
                                    
                                        <p>Teacher ID: {{$teacher->t_id}}</p>
                                        <p>Teacher Name: {{$teacher->t_name}}</p>
                                        <p>Teacher Address: {{$teacher->t_address}}</p>
                                        <p>Teacher Address: {{$teacher->t_level}}</p>
                                        <p>Teacher Email: {{$teacher->email}}</p>
                                        <p>Teacher Phone: {{$teacher->phone}}</p>
                                        <p>Teacher Gender: {{$teacher->gender}}</p>
                                        <p>Teacher Status: {{$teacher->status}}</p>
                                        <p>Teacher DOB: {{$teacher->doa}}</p>
                                        <p>Teacher DOA: {{$teacher->dob}}</p>
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

    $('body').on('click', '.delete-teacher', function() {
    var TeacherID = $(this).val();
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
            window.location.href = "{{ url('c-delete-teacher') }}/" + TeacherID;
        }
    });
    });

        $(".alert").fadeTo(2000, 500).slideUp(500, function(){
            $(".alert").slideUp(500);
        });
    </script>
@endsection