@extends('Coordinator.coordinator-dashboard')

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
    <form action="{{route('c-update-teacher')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="teacher_id" name="teacher_id" value="{{$teachers->id}}">
        
            <div class="form-row">
            <!-- <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Teacher ID</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="teacherId"
                    placeholder="Enter Teacher ID" value="{{$teachers->t_id	}}" />
            </div> -->
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Teacher Name</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="teacherName"
                    placeholder="Enter Name" value="{{$teachers->t_name}}"/>
            </div>
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Teacher Address</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="teacherAddress"
                    placeholder="Enter  Address" value="{{$teachers->t_address}}"/>
            </div>
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">NIC</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="teacherNic"
                    placeholder="Enter NIC No" value="{{$teachers->nic}}"/>
            </div>
        </div>
        <div class="form-row">
        <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Gender</label>
                <!-- <input type="text" class="form-control" id="formGroupExampleInput" name="gender"
                    placeholder="Enter Gender" value="{{$teachers->gender}}"/> -->
                <select class="form-control" id="formGroupExampleInput" name="gender" placeholder="Enter Gender">
                    <option value="M" {{$teachers->gender === 'M' ? 'selected' : ''}}>Male</option>
                    <option value="F" {{$teachers->gender === 'F' ? 'selected' : ''}}>Female</option>
                </select>

            </div>
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Email</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="teacherEmail"
                    placeholder="Enter Email" value="{{$teachers->email}}"/>
            </div>
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Phone</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="phone"
                    placeholder="Enter Phone" value="{{$teachers->phone}}"/>
            </div>
            
            </div>
        <div class="form-row">
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Status</label>
                <!-- <input type="text" class="form-control" id="formGroupExampleInput" name="status"
                    placeholder="Enter Status" value="{{$teachers->status}}"/> -->
                <select class="form-control" id="formGroupExampleInput" name="teacherStatus" placeholder="Enter Status">
                    <option value="Single" {{$teachers->status === 'Single' ? 'selected' : ''}}>Single</option>
                    <option value="Married" {{$teachers->status === 'Married' ? 'selected' : ''}}>Married</option>
                </select>

            </div>
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Husband's Name</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="husbandName"
                    placeholder="Enter Husband's Name" value="{{$teachers->husband_name}}"/>
            </div>
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Husband's Carrier</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="husbandCarrier"
                    placeholder="Enter Carrier" value="{{$teachers->carrier}}"/>
            </div>
            
            </div>
        <div class="form-row">
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Date Of Birth</label>
                <input type="date" class="form-control" id="formGroupExampleInput" name="dob"
                    placeholder="Enter Date Of Birth" value="{{$teachers->dob}}"/>
            </div>
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Date of Admission</label>
                <input type="date" class="form-control" id="formGroupExampleInput" name="doa"
                    placeholder="Enter Date of Admission" value="{{$teachers->doa}}"/>
            </div>
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Teacher Level</label>
                <!-- <input type="text" class="form-control" id="formGroupExampleInput" name="teacherLevel"
                    placeholder="Enter  Level" value="{{$teachers->t_level}}"/> -->
                <select class="form-control" id="formGroupExampleInput" name="teacherLevel" placeholder="Enter Student Level">
                    <option value="Kindergarten" {{$teachers->t_level === 'Kindergarten' ? 'selected' : ''}}>Kindergarten</option>
                    <option value="LKG" {{$teachers->t_level === 'LKG' ? 'selected' : ''}}>LKG</option>
                    <option value="UKG" {{$teachers->t_level === 'UKG' ? 'selected' : ''}}>UKG</option>
                </select>

            </div>
        </div>
        <div class="form-row">
        <div class="col-md-4 mb-4 mt-4 ">
            <input type="file" class="form-control" id="teacher_image" name="teacher_image" onchange="uploadFile()" @if ($teachers->image_name) @else required @endif />
                 
            <div class="col-12 pl-0 ml-0">
                <div id="new_image_container">
                    @if ($teachers->image_name)
                        <img src="{{asset('storage/teacher-images/'.$teachers->image_name)}}" id="new_image_preview" />
                    @else
                        <img src="#" id="new_image_preview" />
                    @endif
                </div>
            </div>
        </div>
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Educational Qualification</label>
                <textarea class="form-control" id="formGroupExampleInput" name="educationQuali" rows="4" cols="50">
                 {{$teachers->educational_qualification}}
                </textarea>
            </div>
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Other Qualification</label>
                <textarea class="form-control" id="formGroupExampleInput" name="otherQuali" rows="4" cols="50" >
                {{$teachers->other_qualification}}
                </textarea>
            </div>
            </div>
            
        
        </div>
        

<div>
<button type="submit" class="btn btn-success float-right m-1">Update</button>
    <a href="{{route('c-teacher')}}" class="btn btn-primary float-right m-1">Back</button></a>
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

