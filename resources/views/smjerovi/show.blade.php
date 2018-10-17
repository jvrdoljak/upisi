@extends('layouts.upisi')

@section('title', '| Smjer')

@section('leftPanel')
  @include('upisi.includes.navigation')
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Prikaz smjera </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('smjerovi.index') }}"> Povratak na listu</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Naziv:</strong>
                {{ $smjer->naziv }}
            </div>
        </div>
    </div>
@endsection
