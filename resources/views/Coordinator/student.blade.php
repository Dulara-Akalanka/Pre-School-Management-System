@extends('Coordinator.coordinator-dashboard')

@section('content')
    <div class="container-fluid mt-3">
        <div class="card w-100">


            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        Student Details
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{route('c-student-add')}}" class="btn btn-primary">Add New Student</a>
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
                                <th>Phone</th>
                                <th>Date of Birth</th>
                                <th>Gender</th>
                                <th>Level</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        	


                        <tbody>
                            @foreach($students as $key=>$student)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$student->s_id}}</td>
                                <td>{{$student->s_name}}</td>
                                <td>
                                <img src="{{asset('storage/student-images/'.$student->image_name)}}" height="100" width="100" />
                                </td>
                               
                                <td>{{$student->s_address}}</td>
                                <td>{{$student->phone}}</td>
                                <td>{{$student->dob}}</td>
                                <td>{{$student->gender}}</td>
                                <td>{{$student->s_level}}</td>
                                <td>

                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#studentrModal-{{$student->id}}"><i class="fa-regular fa-eye"
                                            title="View"></i></button>

                                    <a href="{{url('/c-student-update', $student->id)}}" class="btn btn-warning">
                                    <i class="fa-solid fa-pen-to-square" title="Edit"></i></a>

                                    <button type="button" class="btn btn-danger delete-student" value="{{$student->id}}">
                                        <i class="fa-solid fa-trash-can" title="Delete"></i></button>
                                </td>
                            </tr>

                             <!-- Modal -->
                        <div class="modal fade" id="studentrModal-{{$student->id}}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title fs-5" id="staticBackdropLabel">Student Details</h5>
                                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                    </div>
                                    <div class="modal-body">
                                    
                                        <p>Student ID: {{$student->s_id}}</p>
                                        <p>Student Name: {{$student->s_name}}</p>
                                        <p>Student Address: {{$student->s_address}}</p>
                                        <p>Father Name: {{$student->father_name	}}</p>
                                        <p>Mother Name: {{$student->mother_name	}}</p>
                                        <p>Student Address: {{$student->s_level}}</p>
                                        <p>Student Phone: {{$student->phone}}</p>
                                        <p>Student Gender: {{$student->gender}}</p>
                                        <p>Student DOB: {{$student->doa}}</p>
                                        <p>Student DOA: {{$student->dob}}</p>
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

    $('body').on('click', '.delete-student', function() {
    var StudentID = $(this).val();
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
            window.location.href = "{{ url('c-delete-student') }}/" + StudentID;
        }
    });
    });

        $(".alert").fadeTo(2000, 500).slideUp(500, function(){
            $(".alert").slideUp(500);
        });
    </script>
@endsection
