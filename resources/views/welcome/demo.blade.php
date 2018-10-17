@extends('layouts.welcome')

@section('content')
  @include('layouts.welcome.navigation')
  @include('layouts.welcome.header')
  @include('layouts.welcome.about')
  @include('layouts.welcome.services')
  @include('layouts.welcome.callout')
  @include('layouts.welcome.portfolio')
  @include('layouts.welcome.callToAction')
  @include('layouts.welcome.map')
  @include('layouts.welcome.footer')
  @include('layouts.welcome.scrollToTop')
@stop