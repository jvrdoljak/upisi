@extends('layouts.upisi')

@section('title', '| Izmijeni')

@section('leftPanel')
  @include('upisi.includes.navigation')
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Izmjena prijave</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('prijave.index') }}"> Povratak</a>
            </div>
        </div>
    </div>
    <hr>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Postoji problem s vašim unešenim podacima.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::model($prijava, ['method' => 'PATCH', 'route' => ['prijave.update', $prijava->id]]) !!}
        @include('prijave.form')
    {!! Form::close() !!}
@stop
