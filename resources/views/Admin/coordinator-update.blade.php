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
    <div class="container-fluid mt-3">
        <div class="card w-100">

    @if(session()->get('success'))
    <div class="alert alert-success" role="alert">
        {{session()->get('success')}}
    </div>
    @endif

  
    <div class="card-body">
    <form action="{{route('update-coordinator')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="coordinator_id" name="coordinator_id" value="{{$coordinators->id}}">
        <div class="form-row">
            <!-- <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Coordinator ID</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="coordinatorId"
                    placeholder="Enter Admin ID"  value="{{$coordinators->c_id}}"/>
            </div> -->
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Coordinator Name</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="coordinatorName"
                    placeholder="Enter Name" value="{{$coordinators->c_name}}" />
            </div>
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Coordinator Address</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="coordinatorAddress"
                    placeholder="Enter Address" value="{{$coordinators->c_address}}"/>
            </div>
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Gender</label>
                <!-- <input type="text" class="form-control" id="formGroupExampleInput" name="gender"
                    placeholder="Enter Gender" value="{{$coordinators->gender}}"/>  -->
                    <select class="form-control" id="formGroupExampleInput" name="gender" placeholder="Enter Gender">
                    <option value="M" {{$coordinators->gender === 'M' ? 'selected' : ''}}>Male</option>
                    <option value="F" {{$coordinators->gender === 'F' ? 'selected' : ''}}>Female</option>
                </select>
        </div>
        </div>
        <div class="form-row">
        
        
        <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Status</label>
                <!-- <input type="text" class="form-control" id="formGroupExampleInput" name="coordinatorStatus"
                    placeholder="Enter Status" value="{{$coordinators->status}}"/>  -->
                    <select class="form-control" id="formGroupExampleInput" name="coordinatorStatus" placeholder="Enter Status">
                    <option value="Single" {{$coordinators->status === 'Single' ? 'selected' : ''}}>Single</option>
                    <option value="Married" {{$coordinators->status === 'Married' ? 'selected' : ''}}>Married</option>
                </select>
        </div>
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Date Of Birth</label>
                <input type="date" class="form-control" id="formGroupExampleInput" name="dob"
                    placeholder="Enter Date Of Birth" value="{{$coordinators->dob}}"/>
            </div>
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Date of Admission</label>
                <input type="date" class="form-control" id="formGroupExampleInput" name="doa"
                    placeholder="Enter Date of Admission" value="{{$coordinators->doa}}"/>
            </div>
       
        </div>
        
        <div class="form-row">
            <div class="col-md-4 mb-4">
            <label for="formGroupExampleInput" class="form-label">Coordinator Image</label>
                <input type="file" class="form-control" id="coordinator_image" name="coordinator_image" onchange="uploadFile()" @if ($coordinators->image_name) @else required @endif />
                
            <!-- <div class="col-12 pl-0 ml-0"> -->
                <div class="mt-2" id="new_image_container">
                    @if ($coordinators->image_name)
                        <img src="{{asset('storage/coordinator-images/'.$coordinators->image_name)}}" id="new_image_preview" />
                    @else
                        <img src="#" id="new_image_preview" />
                    @endif
                </div>
                </div>
            <!-- </div> -->
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Email</label>
                <input type="email" class="form-control" id="formGroupExampleInput" name="coordinatorEmail"
                    placeholder="Enter Email" value="{{$coordinators->email}}"/> 
            </div>
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Phone</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="phone"
                    placeholder="Enter Phone" value="{{$coordinators->phone}}"/> 
            </div>
        </div>

    <div>
        <button type="submit" class="btn btn-success float-right m-1">Update</button>
        <a href="{{route('coordinator')}}" class="btn btn-primary float-right m-1">Back</button></a>
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

