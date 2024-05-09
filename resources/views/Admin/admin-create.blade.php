@extends('Admin.admin-dashboard-layout')

@section('content')

<div class="container-fluid mt-3">
<div class="card  w-100" >
    
    @if(session()->get('success'))
    
    <div class="alert alert-success" role="alert">
    {{session()->get('success')}}
    </div>
    @endif 
   

    <div class="card-body">
    <form action="{{route('add-admin')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Admin ID</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="adminId"
                    placeholder="Enter Admin ID" />
            </div>
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Admin Name</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="adminName"
                    placeholder="Enter Name" />
            </div>
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Admin Address</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="adminAddress"
                    placeholder="Enter  Address" />
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Gender</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="gender"
                    placeholder="Enter Gender" />
            </div>
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Email</label>
                <input type="email" class="form-control" id="formGroupExampleInput" name="adminEmail"
                    placeholder="Enter Email" />
            </div>
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Status</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="adminStatus"
                    placeholder="Enter Status" />
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
        </div>
        <div>
            <button class="btn btn-primary mt-4 float-right" type="submit">Submit Form</button>
        </div>
        </form>
    </div>
</div>
</div>
@endsection
