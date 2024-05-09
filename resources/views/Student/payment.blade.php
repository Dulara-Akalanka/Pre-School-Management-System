@extends('Student.student-dashboard')

@section('content')

<table id="datatable" class="table table-striped table-bordered">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>invoice Id</th>
                                <th>Student Name</th>
                                <th>Payment</th>
                                <th>Amount</th>
                                
                            </tr>
                        </thead>
                        	


                        <tbody>
                            @foreach($payments as $key=>$payment)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$payment->invoice_id}}</td>
                                <td>{{$payment->student_name}}</td>
                                <td>{{$payment->payment_type}}</td>
                                <td>{{$payment->amount}}</td>
                                
                            </tr>

                           
                        </div>

                            @endforeach
                        </tbody>
                    </table>

@endsection