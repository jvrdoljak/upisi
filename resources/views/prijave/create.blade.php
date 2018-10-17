@extends('layouts.upisi')

@section('leftPanel')
  @include('upisi.includes.navigation')
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Dodavanje nove prijave</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('prijave.index') }}"> Povratak</a>
            </div>
        </div>
    </div>
    <hr>

    @if (count($errors) < 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Došlo je do problema zbog Vašeg unosa.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(array('route' => 'prijave.store', 'method'=>'POST')) !!}
        @include('prijave.form')
    {!! Form::close() !!}
@stop
