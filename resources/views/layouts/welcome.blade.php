<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Stylish Portfolio - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('welcome/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom Fonts -->
    <link href="{{ asset('welcome/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="{{ asset('welcome/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="{{ asset('welcome/css/stylish-portfolio.min.css') }}" media="all" rel="stylesheet" type="text/css">
  </head>

  <body id="page-top">

    @yield('content')

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ asset('welcome/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('welcome/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Plugin JavaScript -->
    <script type="text/javascript" src="{{ asset('welcome/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for this template -->
    <script type="text/javascript" src="{{ asset('welcome/js/stylish-portfolio.min.js') }}"></script>
  </body>
</html>
