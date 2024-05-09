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
            <form action="{{route('pay-student')}}" method="post" enctype="multipart/form-data">
        @csrf

            <div class="form-row">
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
                        placeholder="Student Name" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="formGroupExampleInput" class="form-label">Month</label>
                    <select class="form-control" id="formGroupExampleInput" name="month" placeholder="Payment Month" >
                            <option value="January" >January</option>
                            <option value="February" >February</option>
                            <option value="March" >March</option>    
                            <option value="April" >April</option> 
                            <option value="May" >May</option> 
                            <option value="June" >June</option>
                            <option value="July" >July</option>
                            <option value="August" >August</option>    
                            <option value="September" >September</option> 
                            <option value="October" >October</option>
                            <option value="November" >November</option> 
                            <option value="December" >December</option> 
                        </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="formGroupExampleInput" class="form-label">Amount</label>
                    <input type="number" class="form-control" id="formGroupExampleInput" name="amount"
                        placeholder="Amount" required>
                </div>

            </div>
            <input type="hidden" class="form-control" id="formGroupExampleInput" name="paymentType" value="Monthly">
            <div>
                <button class="btn btn-primary mt-4 float-right align-text-bottom" type="submit">Submit Form</button>
            </div>
        </div>

    </div>
</div>

<!-- view payments -->
<div class="container-fluid mt-5">
        <div class="card w-100">


            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        Function Payment Records
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Month</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($studentPayments as $key=>$studentPayment)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$studentPayment->student_id}}</td>
                                <td>{{$studentPayment->student_name}}</td>
                                <td>{{$studentPayment->month}}</td>
                                <td>{{$studentPayment->amount}}</td>
                                <td>
                                <a href="{{ url('/view-invoice', $studentPayment->id) }}" class="btn btn-primary">view Invoice </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
            </div>
        </div>
    </div>
@endsection