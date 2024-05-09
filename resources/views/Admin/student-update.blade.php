@extends('Admin.admin-dashboard-layout')

@section('content')

<style>
    #new_image_container {
        width: 100px;
        height: 100px;
        margin-left: 15px;
        border-radius: 50%;
        overflow: hidden;
    }
    #new_image_preview {
        width: 100%;
        height: 100%;
    }
</style>

    <div class="container-fluid">
        <div class="card w-100">

    @if(session()->get('success'))
    <div class="alert alert-success" role="alert">
        {{session()->get('success')}}
    </div>
    @endif

    <div class="card-body">
    <form action="{{route('update-student')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="student_id" name="student_id" value="{{$students->id}}">
        
                <div class="form-row">
                    <!-- <div class="col-md-4 mb-4">
                        <label for="formGroupExampleInput" class="form-label">Student ID</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="studentId"
                            placeholder="Enter Student ID" value="{{$students->s_id}}"/>
                    </div> -->
                    <div class="col-md-4 mb-4">
                        <label for="formGroupExampleInput2" class="form-label">Student Name</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" name="studentName"
                            placeholder="Enter Student Name" value="{{$students->s_name}}"/>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="formGroupExampleInput" class="form-label">Student Level</label>
                        <!-- <input type="text" class="form-control" id="formGroupExampleInput" name="studentLevel"
                            placeholder="Enter Student Level" value="{{$students->s_level}}"/> -->
                        <select class="form-control" id="formGroupExampleInput" name="studentLevel" placeholder="Enter Student Level">
                            <option value="Kindergarten" {{$students->s_level === 'Kindergarten' ? 'selected' : ''}}>Kindergarten</option>
                            <option value="LKG" {{$students->s_level === 'LKG' ? 'selected' : ''}}>LKG</option>
                            <option value="UKG" {{$students->s_level === 'UKG' ? 'selected' : ''}}>UKG</option>
                        </select>
                            
                    </div>
                    <div class="col-md-4 mb-4">
                    <label for="formGroupExampleInput2" class="form-label">Student Religion</label>
                <select class="form-control" id="formGroupExampleInput" name="studentReligion" placeholder="Enter Student Religion">
                    <option value="Christianity" {{$students->religion === 'Christianity' ? 'selected' : ''}}>Christianity</option>
                    <option value="Buddhism" {{$students->religion === 'Buddhism' ? 'selected' : ''}}>Buddhism</option>
                    <option value="Hinduism" {{$students->religion === 'Hinduism' ? 'selected' : ''}}>Hinduism</option>
                    <option value="Islam" {{$students->religion === 'Islam' ? 'selected' : ''}}>Islam</option>
                    <option value="Other" {{$students->religion === 'Other' ? 'selected' : ''}}>Other</option>
                </select>
                </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-4">
                        <label for="formGroupExampleInput" class="form-label">Father's Name</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="fatherName"
                            placeholder="Enter Father's Name" value="{{$students->father_name}}"/>
                    </div>

                    <div class="col-md-4 mb-4">
                        <label for="formGroupExampleInput" class="form-label">Mother's Name</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="motherName"
                            placeholder="Enter Mother's Name" value="{{$students->mother_name}}"/>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="formGroupExampleInput" class="form-label">Gardian Name</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="g_name"
                            placeholder="Enter a Gardian's Name" value="{{$students->gardian_name}}">
                    </div>
                    
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-4">
                        <label for="formGroupExampleInput" class="form-label">Date Of Birth</label>
                        <input type="date" class="form-control" id="formGroupExampleInput" name="dob"
                            placeholder="Enter Date Of Birth" value="{{$students->dob}}"/>
                    </div>

                    <div class="col-md-4 mb-4">
                        <label for="formGroupExampleInput" class="form-label">Date of Admission</label>
                        <input type="date" class="form-control" id="formGroupExampleInput" name="doa"
                            placeholder="Enter Date of Admission" value="{{$students->doa}}"/>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="formGroupExampleInput" class="form-label">Gender</label>
                        <!-- <input type="text" class="form-control" id="formGroupExampleInput" name="gender"
                            placeholder="Enter Gender" value="{{$students->gender}}"/> -->
                        <select class="form-control" id="formGroupExampleInput" name="gender" placeholder="Enter Gender">
                            <option value="M" {{$students->gender === 'M' ? 'selected' : ''}}>Male</option>
                             <option value="F" {{$students->gender === 'F' ? 'selected' : ''}}>Female</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-4">
                        <label for="formGroupExampleInput" class="form-label">Transport Service</label><br>
                        <input type="radio" id="transportYes" name="transport" value="True" {{$students->transport === 'True' ? 'checked' : ''}}>
                        <label for="transportYes">Need Transport</label><br>
                        <input type="radio" id="transportNo" name="transport" value="False" {{$students->transport === 'False' ? 'checked' : ''}}>
                        <label for="transportNo">No Need Transport</label>

                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="formGroupExampleInput" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="phone"
                            placeholder="Enter Phone" value="{{$students->phone}}"/>
                     </div>
                    <div class="col-md-4 mb-4">
                        <label for="formGroupExampleInput" class="form-label">Address</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="studentAddress"
                            placeholder="Enter Address" value="{{$students->s_address}}"/>
                    </div>
                </div>

                <div class="form-row">
                <div class="col-md-4 mb-4 mt-4">
                    <input type="file" class="form-control" id="student_image" name="student_image" onchange="uploadFile()" @if ($students->image_name) @else required @endif />
                 
                <!-- <div class="col-12 pl-0 ml-0"> -->
                    <div id="new_image_container">
                        @if ($students->image_name)
                         <img src="{{asset('storage/student-images/'.$students->image_name)}}" id="new_image_preview" />
                        @else
                         <img src="#" id="new_image_preview" />
                        @endif
                    </div>
                    </div>
                    <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Date of Termination</label>
                <input type="date" class="form-control" id="formGroupExampleInput" name="dot"
                    placeholder="Enter Date of Termination" value="{{$students->dot}}"/>
            </div>
                </div>
                
                
                  <div>  
                  <button type="submit" class="btn btn-success float-right m-1">Update</button>
    <a href="{{route('student')}}" class="btn btn-primary float-right m-1">Back</button></a>
                </div>
    
    </form>

</div>
</div>
<script>
    $(".alert").fadeTo(2000, 500).slideUp(500, function(){
            $(".alert").slideUp(500);
        });


        function uploadFile() {
        var image_preview = document.getElementById("new_image_preview");
        var file = document.querySelector("input[type=file]").files[0];

        var reader = new FileReader();
        reader.onloadend = function () {
            image_preview.src = reader.result;
            document.getElementById("base64").value = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);

        } else {
            image_preview.src = "";

        }
    };

</script>
@endsection

