@extends('Coordinator.coordinator-dashboard')


@section('content')



<div class="container-fluid mt-3">
    <div class="card  w-100" >

@if(session()->get('success'))
    <div class="alert alert-success" role="alert">
        {{session()->get('success')}}
    </div>
@endif 

        <div class="card-body">
            <form action="{{route('c-pay-student')}}" method="post" enctype="multipart/form-data">
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
                        placeholder="Student Name">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="formGroupExampleInput" class="form-label">Other Payments</label>
                    <textarea class="form-control" id="formGroupExampleInput" name="other" rows="1" cols="50" placeholder="Description">
                </textarea>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="formGroupExampleInput" class="form-label">Amount</label>
                    <input type="number" class="form-control" id="formGroupExampleInput" name="amount"
                        placeholder="Amount">
                </div>

            </div>
            <input type="hidden" class="form-control" id="formGroupExampleInput" name="paymentType" value="Other">
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
                                <th>Other Payment</th>
                                <th>Amount</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($studentPayments as $key=>$studentPayment)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$studentPayment->student_id}}</td>
                                <td>{{$studentPayment->student_name}}</td>
                                <td>{{$studentPayment->other}}</td>
                                <td>{{$studentPayment->amount}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
            </div>
        </div>
    </div>
@endsection
