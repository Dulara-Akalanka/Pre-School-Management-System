@extends('Admin.admin-dashboard-layout')

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
    <form action="{{route('add-coordinator')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="m-1">
        <span style="color: red">*</span> indicates a required field
        <hr>
        </div>

        <div class="form-row">
            <!-- <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Coordinator ID</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="coordinatorId"
                    placeholder="Enter Coordinator ID" />
            </div> -->
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label"><span style="color: red">*</span>Coordinator Name</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="coordinatorName"
                    placeholder="Enter Name" required/>
            </div>
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label"><span style="color: red">*</span>Coordinator Address</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="coordinatorAddress"
                    placeholder="Enter  Address" required/>
            </div>
           
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label"><span style="color: red">*</span>Gender</label>
                <select class="form-control" id="formGroupExampleInput" name="gender" placeholder="Enter Gender" >
                    <option value="M" >Male</option>
                    <option value="F" >Female</option>   
                </select>
            </div>
        </div>
        <div class="form-row">
        
        
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label"><span style="color: red">*</span>Status</label>
                <select class="form-control" id="formGroupExampleInput" name="coordinatorStatus" placeholder="Enter Status" >
                    <option value="Single" >Single</option>
                    <option value="Married" >Married</option>   
                </select>
            </div>
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
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label"><span style="color: red">*</span>Coordinator Image</label>
                <input type="file" class="form-control" id="image" name="coordinator_image" placeholder="Coordinator Image" required/>
                <br>
                <img id="coordinator_image" name="coordinator_image" class="rounded-circle" height="100" width="100" src="#">
            </div>
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label"><span style="color: red">*</span>Email</label>
                <input type="email" class="form-control" id="formGroupExampleInput" name="coordinatorEmail"
                    placeholder="Enter Email" required/> 
            </div>
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label"><span style="color: red">*</span>Phone</label>
                <input type="tel" class="form-control" id="formGroupExampleInput" name="phone"
                    placeholder="Enter Phone Number" pattern="[0-9]{10}" required/>
            </div>
           
        </div>
        
        
        <div>
        <button class="btn btn-primary mt-4 float-right align-text-bottom" type="submit">Submit Form</button>
        </div>
        
        
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
<script>

    // $(".alert").fadeTo(2000, 500).slideUp(500, function(){
    //     $(".alert").slideUp(500);
    // });

    $(document).ready(function(e) {
            $('#image').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#coordinator_image').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
</script>
@endsection
