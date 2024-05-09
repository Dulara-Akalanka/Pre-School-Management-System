@extends('Coordinator.coordinator-dashboard')

@section('content')

<div class="container-fluid mt-3">
<div class="card  w-100" >

    @if(session()->get('success'))
    <div class="alert alert-success" role="alert">
    {{session()->get('success')}}
    </div>
    @endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="card-body">
        <form action="{{route('c-add-teacher')}}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="form-row">
            <!-- <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Teacher ID</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="teacherId"
                    placeholder="Enter Teacher ID" />
            </div> -->
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Teacher Name</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="teacherName"
                    placeholder="Enter Name" />
            </div>
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Teacher Address</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="teacherAddress"
                    placeholder="Enter  Address" />
            </div>
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">NIC</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="teacherNic"
                    placeholder="Enter NIC No" />
            </div>
        </div>
        <div class="form-row">
        <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Gender</label>
                <select class="form-control" id="formGroupExampleInput" name="gender" placeholder="Enter Gender" >
                    <option value="M" >Male</option>
                    <option value="F" >Female</option>   
                </select>
        </div>
        <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Email</label>
                <input type="email" class="form-control" id="formGroupExampleInput" name="teacherEmail"
                    placeholder="Enter Email" /> 
        </div>
        <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Phone</label>
                <input type="tel" class="form-control" id="formGroupExampleInput" name="phone"
                    placeholder="Enter Phone Number" pattern="[0-9]{10}"/>
            </div>
        
    </div>
        <div class="form-row">
        <div class="col-md-4 mb-4">
            <label for="formGroupExampleInput" class="form-label">Status</label>
            <select class="form-control" id="formGroupExampleInput" name="teacherStatus" placeholder="Enter Status" >
                <option value="Single" >Single</option>
                <option value="Married" >Married</option>   
            </select>
        </div>
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Husband's Name</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="husbandName"
                    placeholder="Enter Husband's Name" />
            </div>
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Husband's Carrier</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="husbandCarrier"
                    placeholder="Enter Carrier" />
            </div>
        
            
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Date Of Birth</label>
                <input type="date" class="form-control" id="formGroupExampleInput" name="dob"
                    placeholder="Enter Date Of Birth" />
            </div>
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Date of Admission</label>
                <input type="date" class="form-control" id="formGroupExampleInput" name="doa"
                    placeholder="Enter Date of Admission" />
            </div>
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Teacher Level</label>
                <select class="form-control" id="formGroupExampleInput" name="teacherLevel" placeholder="Enter Student Level" >
                    <option value="Kindergarten" >kindergarten</option>
                    <option value="LKG" >LKG</option>
                    <option value="UKG" >UKG</option>    
                </select>
            </div>
        </div>
       <div class="form-row">
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Teacher Image</label>
                <input type="file" class="form-control" id="image" name="teacher_image" placeholder="Teacher Image">
                <br>
                <img id="teacher_image" name="teacher_image" class="rounded-circle" height="100" width="100" src="#">
            </div>
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Educational Qualification</label>
                <textarea class="form-control" id="formGroupExampleInput" name="educationQuali" rows="4" cols="50">
                </textarea>
            </div>
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Other Qualification</label>
                <textarea class="form-control" id="formGroupExampleInput" name="otherQuali" rows="4" cols="50">
                </textarea>
            </div>
            
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Date of Termination</label>
                <input type="date" class="form-control" id="formGroupExampleInput" name="dot"
                    placeholder="Enter Date of Termination" />
            </div>
            <div class="col-md-4 mb-4">
            </div>
            <div class="col-md-4 mb-4">
             <button class="btn btn-primary mt-4 float-right align-text-bottom" type="submit">Submit Form</button>
             </div>
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
                    $('#teacher_image').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
</script>
@endsection

