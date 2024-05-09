@extends('Teacher.teacher-dashboard')

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    
@section('content')
    <style>
        .container {
            max-width: 500px;
        }
        dl, ol, ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
    </style>

<body>
    <div class="container mt-5">
        <form action="{{route('upload-file')}}" method="post" enctype="multipart/form-data">
          <h3 class="text-center mb-5">Upload File </h3>
            @csrf
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
          @endif
          @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
            <!-- <div class="col-md-4 mb-4"> -->
            <label for="formGroupExampleInput" class="form-label">Level</label>
            <select class="form-control" id="formGroupExampleInput" name="level" placeholder="Enter Student Level" >
                            <option value="Kindergarten" >kindergarten</option>
                            <option value="LKG" >LKG</option>
                            <option value="UKG" >UKG</option>    
                        </select>
                        <!-- <input type="text" class="form-control" id="formGroupExampleInput" name="level" placeholder="Enter Level" required> -->
                    <!-- </div> -->
                    <label for="formGroupExampleInput" class="form-label">Name</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="name" placeholder="Enter File Name" required>

                <label for="formGroupExampleInput" class="form-label">File Name</label>
                <input type="file" class="form-control" id="chooseFile" name="file_path" placeholder="Select the File" required>
                
            </div>
            <label for="formGroupExampleInput" class="form-label">  
            <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                Upload Files
            </button>
            </label>
        </form>

        <div class="card-body">
        <div class="table-responsive">
        <table id="datatable" class="table table-striped table-bordered">

        <thead>
        <tr>
             <th>No</th>
            <th>Level</th>
            <th>Name</th>
            <!-- <th>File Path</th> -->
            <th>More</th>
        </tr>
        </thead>

        <tbody>
            @foreach($files as $key=>$file)
            <tr>
                <td>{{$key +1}}</td>
                <td>{{$file->level}}</td>
                <td>{{$file->name}}</td>
                <!-- <td>{{$file->file_path}}</td> -->
                <td>

                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#"><i class="bi bi-cloud-download" title="download"></i></button>

                <button type="button" class="btn btn-danger delete-file"
                 value=""><i class="fa-solid fa-trash-can"></i></button>

                </td>
            </tr>
                @endforeach
    </tbody>
  </table>                          
</div>
</div>
</div>


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

        $('body').on('click', '.delete-file', function() {
    var FileID = $(this).val();
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
            window.location.href = "{{ url('delete-file') }}/";
        }
    });
});

$(".alert").fadeTo(2000, 500).slideUp(500, function(){
            $(".alert").slideUp(500);
        });
    </script>

@endsection
