@extends('layouts.upisi')
{{-- @section('leftPanel')
  @include('upisi.includes.navigation')
@stop --}}
@section('content')

{!! Form::open(array('route' => 'files.store', 'method'=>'POST', 'files' => true, 'enctype' => 'multipart/form-data')) !!}
    {{ csrf_field() }}
    {{ Form::file('file', array('class' => 'form-control')) }}
    {{ Form::select('prijava_id', array($id => $id), null, array('class' => 'form-control', 'style' => 'display:none;')) }}
    {{ Form::submit('Učitaj', array('class' => 'btn btn-primary form-control mt-2')) }}
{!! Form::close() !!}

@endsection
 