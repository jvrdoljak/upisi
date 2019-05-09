@extends('layouts.upisi')
{{-- @section('leftPanel')
  @include('upisi.includes.navigation')
@stop --}}
@section('content')

{!! Form::open(array('route' => 'odabirsmjera.store', 'method'=>'POST'))!!}
    @include('odabir.form')
{!! Form::close() !!}

@endsection
