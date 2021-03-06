<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title> Upisi @yield('title') </title>

    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{ asset('upisi/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('upisi/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('upisi/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('upisi/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('upisi/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('upisi/css/cs-skin-elastic.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('upisi/css/bootstrap-select.less') }}"> -->
    <link rel="stylesheet" href="{{ asset('upisi/scss/style.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link rel="stylesheet" href="{{ asset('upisi/css/lib/vector-map/jqvmap.min.css') }}">
</head>
<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        @yield('leftPanel')
    </aside><!-- /#left-panel -->
    <!-- Left Panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <div class="container mt-2">
            @yield('content')
        </div>
    </div><!-- /#right-panel -->
    <!-- Right Panel -->

    <script src="{{ asset('upisi/js/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="{{ asset('upisi/js/plugins.js') }}"></script>
    <script src="{{ asset('upisi/js/main.js') }}"></script>

    @yield('additionalScripts')

</body>
</html>
