@extends('layouts.welcome')
@section('content')
    @include('welcome.includes.navigation')
    @include('kreiranjeranglisti.layouts.header')
    @include('kreiranjeranglisti.layouts.all_lists')
    @include('layouts.welcome.footer')
    @include('layouts.welcome.scrollToTop')
@stop
