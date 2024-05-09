@extends('Admin.admin-dashboard-layout')

@section('content')

<div class="container-fluid">
        <div class="card w-100">

    @if(session()->get('success'))
    <div class="alert alert-success" role="alert">
        {{session()->get('success')}}
    </div>
    @endif

    
    <div class="card-body">
    <form action="{{route('credential')}}" method="post" enctype="multipart/form-data">
        @csrf
        
        <div class="form-row">
        <div class="col-md-3 mb-3">
                    <label for="formGroupExampleInput" class="form-label">Coordinator Id</label>
                    <select name="userId" class="form-control">
                        @foreach($data as $row)
                            <option value="{{$row->c_id}}">{{$row->c_id}}</option>
                        @endforeach
                    </select>

                </div>
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Coordinator UserName</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="username"
                    placeholder="Enter User Name" required/>
            </div>
            <div class="col-md-4 mb-4">
                <label for="formGroupExampleInput" class="form-label">Password</label>
                <input type="password" class="form-control" id="formGroupExampleInput" name="password"
                    placeholder="Enter  Password" required/>
            </div>
            <input type="hidden" class="form-control" id="formGroupExampleInput" name="userType" value="coordinator"/>
        </div>
     
        
        <button type="submit" class="btn btn-success">Save</button>
    
    </form>

</div>
</div>

<table class="table table-hover table-striped">
            <thead>
                <tr>
                <th>No</th>
                <th>Username</th>
                <th>User Type</th>
            </tr>
            </thead>
            <tbody>

                @foreach ($passwords as $key=>$password)
                <tr>
                <td>{{ $key +1 }}</td>
                <td>{{ $password->username }}</td>
                <td>{{ $password->user_type }}</td>
            </tr>
                @endforeach

            </tbody>

        </table>


@endsection