@extends('layouts.upisi')
{{-- @section('leftPanel')
  @include('upisi.includes.navigation')
@stop --}}
@section('content')

@if($errors->any())
  <div class="alert alert-danger" role="alert">
    <p>{{ $errors->first() }}</p>
  </div>
@else
  {!! Form::open(array('route' => 'odabirsmjera.store', 'method'=>'POST'))!!}
      @include('odabir.form')
  {!! Form::close() !!}
@endif
@endsection
