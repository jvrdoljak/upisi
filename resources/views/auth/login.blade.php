@extends('layouts.upisi')

@section('title', ' | Login')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            {!! Form::open() !!}
                {{ Form::email('email', null, array('placeholder' => 'Email', 'class' => 'form-control mt-2')) }}
                {{ Form::password('password', array('placeholder' => 'Lozinka', 'class' => 'form-control mt-2 mb-2')) }}
                {{ Form::checkbox('remember') }}{{ Form::label('remember', "Zapamti me") }}
                {{ Form::submit('Prijavi se', array('class' => 'btn btn-block btn-primary mt-2')) }}
            {!! Form::close() !!}
        </div>
    </div>


@endsection