@extends('layouts.upisi')
@section('leftPanel')
@if(!$errors->any())
  <div class="row" style="color:white;">
      <div class="col-lg-12 margin-tb">
          <div class="pull-left">
              <h2>Drugi korak upisa u srednju školu</h2>
              <hr>
              <p>Klikom na padajući izbornik birate koji smjer želite odabrati.</p>
          </div>
      </div>
  </div>
@endif
@stop
@section('content')

@if($errors->any())
  <div class="alert alert-danger" role="alert">
    <p>{{ $errors->first() }}</p>
  </div>
@else
  <div class="row">
    <div class="col-lg-12 margin-tb">
      <p>
        Vaše ime i prezime: <strong> {{ $prijava['ime']." ".$prijava['prezime'] }}</strong>
      </p>
      
      {!! Form::open(array('route' => 'odabirsmjera.store', 'method'=>'POST'))!!}
          @include('odabir.form')
      {!! Form::close() !!}
    </div>
  </div>
@endif
@endsection
