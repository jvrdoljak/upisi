@extends('layouts.upisi')

@section('title', '| Prijava')

@section('leftPanel')
  @include('upisi.includes.navigation')
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Prikaz prijave</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('prijave.index') }}"> Povratak na listu</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Ime:</strong>
                {{ $prijava->ime }}
            </div>
            <div class="form-group">
                <strong>Prezime:</strong>
                {{ $prijava->prezime }}
            </div>
            <div class="form-group">
                <strong>Ime oca:</strong>
                {{ $prijava->ime_oca }}
            </div>
            @foreach($fileNames as $fileName)
                <div class="form-group">
                    <strong>Dokument:</strong>
                <a href='{{ route('files.download', $fileName['unique']) }}'>{{  $fileName['original'] }}</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
