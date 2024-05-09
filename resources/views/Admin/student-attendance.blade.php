@extends('Admin.admin-dashboard-layout')

@section('content')
<!-- <link rel="stylesheet" href={{asset('styleBarcode.css')}}> -->
<!-- <link rel="stylesheet" href={{asset('bootstrap.css')}}> -->
<!-- <style type="text/css">

    .pos-style{
        background-image: url(img/epos.jpg);
        height: 400px;
    }
    </style> -->

<body onload="document.pos.barcode.focus();">
    <div class="container mt-5">

        <form class="pos-style" name="pos" action="{{ route('barcode-scan') }}" method="post">
            @csrf
        <div class="form-group">

            <input type="text" name="barcode" class="form-control" placeholder="bar code reader">
            </div>

        </form>

        <table class="table table-hover table-striped">
            <thead>
                <tr>
                <th>No</th>
                <th>Barcode</th>
                <th>Date & Time</th>
            </tr>
            </thead>
            <tbody>

                @foreach ($attendances as $key=>$attendance)
                <tr>
                <td>{{ $key +1 }}</td>
                <td>{{ $attendance->barcode }}</td>
                <td>{{ $attendance->date }}</td>
            </tr>
                @endforeach

            </tbody>

        </table>

    </div>

</body>
@endsection