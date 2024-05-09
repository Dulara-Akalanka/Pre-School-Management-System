@extends('Coordinator.coordinator-dashboard')

@section('content')

    <div class="container-fluid">
        <div class="card w-100">

    @if(session()->get('success'))
    <div class="alert alert-success" role="alert">
        {{session()->get('success')}}
    </div>
    @endif

    <div class="card m-5" style="width: 80rem;">
    <div class="card-body">
    <form action="{{route('update-coordinator')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="coordinator_id" name="coordinator_id" value="{{$coordinators->id}}">
        <div class="form-row">
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Coordinator ID</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="coordinatorId"
                    placeholder="Enter Admin ID"  value="{{$coordinators->c_id}}"/>
            </div>
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Coordinator Name</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="coordinatorName"
                    placeholder="Enter Name" value="{{$coordinators->c_name}}"/>
            </div>
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Coordinator Address</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="coordinatorAddress"
                    placeholder="Enter  Address" value="{{$coordinators->c_address}}"/>
            </div>
        </div>
        <div class="form-row">
        <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Gender</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="gender"
                    placeholder="Enter Gender" value="{{$coordinators->gender}}"/>
            </div>
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Date Of Birth</label>
                <input type="date" class="form-control" id="formGroupExampleInput" name="dob"
                    placeholder="Enter Date Of Birth" value="{{$coordinators->d_o_b}}" />
            </div>
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Date of Admission</label>
                <input type="date" class="form-control" id="formGroupExampleInput" name="doa"
                    placeholder="Enter Date of Admission" value="{{$coordinators->d_o_a}}"/>
            </div>
        </div>


        <button type="submit" class="btn btn-success">Update</button>
    <a href="{{route('coordinator')}}" class="btn btn-primary">Back</button></a>
    </form>

</div>
</div>
@endsection

