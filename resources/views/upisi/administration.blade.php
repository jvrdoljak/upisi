@extends('layouts.upisi')

@section('leftPanel')
  @include('upisi.includes.navigation')
@stop

@section('content')
  @include('upisi.includes.header')
  @include('layouts.upisi.dashboard')
@stop

@section('additionalScripts')
  @include('upisi.includes.additionalScripts')
@stop
