@extends('Admin.admin-dashboard-layout')

@section('content')

<div class="container-fluid mt-3">
        <div class="card w-100">
   
    @if(session()->get('success'))
    <div class="alert alert-success" role="alert">
        {{session()->get('success')}}
    </div>
    @endif
    
    
    <div class="card-body">
    <form action="{{route('update-admin')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="admin_id" name="admin_id" value="{{$admins->id}}">
        <div class="form-row">
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Admin ID</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="adminId"
                    placeholder="Enter Admin ID"  value="{{$admins->a_id}}"/>
            </div>
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Admin Name</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="adminName"
                    placeholder="Enter Name" value="{{$admins->a_name}}"/>
            </div>
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Admin Address</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="adminAddress"
                    placeholder="Enter  Address" value="{{$admins->a_address}}"/>
            </div>
        </div>
        <div class="form-row">
        <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Email</label>
                <input type="email" class="form-control" id="formGroupExampleInput" name="email"
                    placeholder="Enter Gender" value="{{$admins->email}}"/>
            </div>
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Phone</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="phone"
                    placeholder="Enter Phone" value="{{$admins->phone}}"/>
            </div>
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Gender</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="gender"
                    placeholder="Enter Gender" value="{{$admins->gender}}"/>
            </div>
            
        </div>
        <div class="form-row">
        <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Status</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="status"
                    placeholder="Enter Status"  value="{{$admins->status}}" />
                    
            </div>
        <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Date Of Birth</label>
                <input type="date" class="form-control" id="formGroupExampleInput" name="dob"
                    placeholder="Enter Date Of Birth" value="{{$admins->dob}}" />
            </div>
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Date of Admission</label>
                <input type="date" class="form-control" id="formGroupExampleInput" name="doa"
                    placeholder="Enter Date of Admission" value="{{$admins->doa}}"/>
            </div>
        </div>


        <button type="submit" class="btn btn-success float-right m-1">Update</button>
        <a href="{{route('admin')}}" class="btn btn-primary float-right m-1">Back</button></a>
    </form>

</div>
</div>
</div>
<script>
    $(".alert").fadeTo(2000, 500).slideUp(500, function(){
            $(".alert").slideUp(500);
        });

</script>
@endsection

