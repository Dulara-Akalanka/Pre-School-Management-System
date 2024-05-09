@extends('Admin.admin-dashboard-layout')

@section('content')

<div class="container-fluid">
<div class="card  w-100" >

@if(session()->get('success'))
<div class="alert alert-success" role="alert">
    {{session()->get('success')}}
</div>
@endif 

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <div class="card-body">
    <form action="{{route('add-student')}}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="m-1">
        <span style="color: red">*</span> indicates a required field
        <hr>
    </div>

    <div class="form-row">
                    <!-- <div class="col-md-4 mb-4">
                        <label for="formGroupExampleInput" class="form-label">Student ID</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="studentId"
                            placeholder="Enter Student ID" />
                    </div> -->
                    <div class="col-md-4 mb-4">
                        <label for="formGroupExampleInput2" class="form-label"><span style="color: red">*</span>Student Name</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" name="studentName"
                            placeholder="Enter Student Name" required/>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="formGroupExampleInput" class="form-label"><span style="color: red">*</span>Student Level</label>
                        <select class="form-control" id="formGroupExampleInput" name="studentLevel" placeholder="Enter Student Level" >
                            <option value="Kindergarten" >kindergarten</option>
                            <option value="LKG" >LKG</option>
                            <option value="UKG" >UKG</option>    
                        </select>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="formGroupExampleInput2" class="form-label"><span style="color: red">*</span>Student Religion</label>
                        <select class="form-control" id="formGroupExampleInput" name="studentReligion" placeholder="Enter Student Religion" >
                            <option value="Christianity" >Christianity</option>
                            <option value="Buddhism" >Buddhism</option>
                            <option value="Hinduism" >Hinduism</option>    
                            <option value="Islam" >Islam</option> 
                            <option value="Other" >Other</option> 
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-4">
                        <label for="formGroupExampleInput" class="form-label"><span style="color: red">*</span>Father's Name</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="fatherName"
                            placeholder="Enter Father's Name" required/>
                    </div>

                    <div class="col-md-4 mb-4">
                        <label for="formGroupExampleInput" class="form-label"><span style="color: red">*</span>Mother's Name</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="motherName"
                            placeholder="Enter Mother's Name" required/>
                    </div>
                    
                    <div class="col-md-4 mb-4">
                        <label for="formGroupExampleInput" class="form-label"><span style="color: red">*</span>Gardian Name</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="g_name"
                            placeholder="Enter a Gardian's Name" required/>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-4">
                        <label for="formGroupExampleInput" class="form-label"><span style="color: red">*</span>Date Of Birth</label>
                        <input type="date" class="form-control" id="formGroupExampleInput" name="dob"
                            placeholder="Enter Date Of Birth" required/>
                    </div>

                    <div class="col-md-4 mb-4">
                        <label for="formGroupExampleInput" class="form-label"><span style="color: red">*</span>Date of Admission</label>
                        <input type="date" class="form-control" id="formGroupExampleInput" name="doa"
                            placeholder="Enter Date of Admission" required/>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="formGroupExampleInput" class="form-label"><span style="color: red">*</span>Gender</label>
                        <!-- <input type="text" class="form-control" id="formGroupExampleInput" name="gender"
                            placeholder="Enter Gender"> -->
                        <select class="form-control" id="formGroupExampleInput" name="gender" placeholder="Enter Gender" >
                            <option value="M" >Male</option>
                            <option value="F" >Female</option>    
                        </select>
                    </div>

                </div>
                <div class="form-row">
                
                <div class="col-md-4 mb-4">
                        <label for="formGroupExampleInput" class="form-label"><span style="color: red">*</span>Tansport Service</label><br>
                        <input type="radio" id="formGroupExampleInput" name="transport" value="True" >
                        <label for="">Need Transport</label><br>
                        <input type="radio" id="formGroupExampleInput" name="transport" value="False">
                        <label for="">No Need Transport</label>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="formGroupExampleInput" class="form-label"><span style="color: red">*</span>Phone</label>
                        <input type="tel" class="form-control" id="formGroupExampleInput" name="phone"
                            placeholder="Enter a Mobile Number" pattern="[0-9]{10}" required/>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="formGroupExampleInput" class="form-label"><span style="color: red">*</span>Address</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="studentAddress"
                            placeholder="Enter Address" required/>
                    </div>
                    
                </div>
                <div class="form-row">
                <div class="col-md-4 mb-4">
                    <label for="formGroupExampleInput" class="form-label"><span style="color: red">*</span>Student Image</label>
                    <input type="file" class="form-control" id="image" name="student_image" placeholder="Student Image" required/>
                    <br>
                    <img id="student_image" name="student_image" class="rounded-circle" height="100" width="100" src="#">
                </div>

            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Date of Termination</label>
                <input type="date" class="form-control" id="formGroupExampleInput" name="dot"
                    placeholder="Enter Date of Termination" />
            </div>
           
            
            <div class="col-md-4 mb-4">
                
                    <button class="btn btn-primary mt-4 float-right align-text-bottom" type="submit">Submit Form</button>
                </div>
                
    </form>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
<script>

    $(".alert").fadeTo(2000, 500).slideUp(500, function(){
        $(".alert").slideUp(500);
    });

    $(document).ready(function(e) {
            $('#image').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#student_image').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
</script>
@endsection
