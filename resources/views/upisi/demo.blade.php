@extends('layouts.upisi')

@section('leftPanel')
  @include('layouts.upisi.navigation')
@stop

@section('content')
    @include('layouts.upisi.header')
    @include('layouts.upisi.breadcrumb')
    @include('layouts.upisi.dashboard')
@stop

@section('additionalScripts')
  @include('layouts.upisi.additionalScripts')
@stop