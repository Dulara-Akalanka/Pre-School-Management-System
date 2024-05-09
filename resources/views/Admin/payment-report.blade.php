@extends('Admin.admin-dashboard-layout')

@section('content')

<div class="container-fluid mt-3">
    <div class="card  w-100" >

@if(session()->get('success'))
    <div class="alert alert-success" role="alert">
        {{session()->get('success')}}
    </div>
@endif 
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        Generate Payment Report
                    </div>
                </div>
            </div>
        <div class="card-body">
            <form action="{{route('pay-student')}}" method="post" enctype="multipart/form-data">
        @csrf

            <!-- <div class="form-row">
                <div class="col-md-3 mb-3">
                    <label for="formGroupExampleInput" class="form-label">Student Id</label>
                    <select name="studentId" class="form-control">
                        @foreach($data as $row)
                            <option value="{{$row->s_id}}">{{$row->s_id}}</option>
                         @endforeach
                    </select>

                </div>
                <div class="col-md-3 mb-3">
                    <label for="formGroupExampleInput" class="form-label">Student Name</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" name="studentName"
                        placeholder="Student Name">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="formGroupExampleInput" class="form-label">Payment Type</label>
                    <select class="form-control" id="formGroupExampleInput" name="type" placeholder="Select Function" >
                            <option value="Monthly" >Monthly</option>
                            <option value="Function" >Function</option>
                            <option value="Other" >Other</option>    
                    </select>
                </div> -->
                <div class="col-md-3 mb-3">
                        <label for="formGroupExampleInput" class="form-label">Date From:</label>
                        <input type="date" class="form-control" id="formGroupExampleInput" name="dFrom"/>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="formGroupExampleInput" class="form-label"></span>Date To:</label>
                        <input type="date" class="form-control" id="formGroupExampleInput" name="dTo"/>
                    </div>
                    <div class="col-md-3 mb-3">
                    </div>
                    <div class="col-md-3 mb-3">
                    </div>
                    <div class="col-md-3 mb-3 float-right">
                    <button class="btn btn-primary mt-4 float-right align-text-bottom" type="submit">Search</button>
                    </div>
            </div>
            <input type="hidden" class="form-control" id="formGroupExampleInput" name="paymentType" value="Other">
            
        </div>

        <table id="datatable" class="table table-striped table-bordered">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Studennt ID</th>
                                <th>Date n Time</th>
                                
                            </tr>
                        </thead>
                        	


                        <tbody>
                            @foreach($attendances as $key=>$attendance)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$attendance->barcode}}</td>
                                <td>{{$attendance->date}}</td>
                                
                            </tr>

                           
                        </div>

                            @endforeach
                        </tbody>
                    </table>

    </div>
</div>

@endsection