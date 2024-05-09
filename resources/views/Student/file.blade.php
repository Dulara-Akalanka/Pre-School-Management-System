{!! Form::open(['route' => 'file.upload', 'files' => true]) !!}
{!! Form::file('file') !!}
{!! Form::submit('Upload File') !!}
{!! Form::close() !!}

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif