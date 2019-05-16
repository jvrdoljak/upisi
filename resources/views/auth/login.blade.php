@extends('layouts.upisi')

@section('title', ' | Login')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            {!! Form::open() !!}
                {{ Form::email('email', null, array('placeholder' => 'Email', 'class' => 'form-control')) }}
                {{ Form::password('password', array('placeholder' => 'Lozinka', 'class' => 'form-control')) }}
                {{ Form::checkbox('remember') }}{{ Form::label('remember', "Zapamti me") }}
                {{ Form::submit('Prijavi se', array('class' => 'btn btn-block btn-primary')) }}
            {!! Form::close() !!}
        </div>
    </div>


@endsection