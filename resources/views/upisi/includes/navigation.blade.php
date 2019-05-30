<nav class="navbar navbar-expand-sm navbar-default">
    <div class="navbar-header">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand" href="./"><img src="{{ asset('images/logo3.png') }}" alt="Logo"></a>
        <a class="navbar-brand hidden" href="./"><img src="{{ asset('images/logo3.png') }}" alt="Logo"></a>
    </div>

    <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="active">
                <a href="{{ url('/') }}"> <i class="menu-icon fa fa-home"></i>Povratak na naslovnicu</a>
            </li>
            <li class="active">
                <a href="{{ url('/upisi/administration') }}"> <i class="menu-icon fa fa-dashboard"></i>Administracija</a>
            </li>
            <li>
                <a href="{{ url('/upisi/prijave') }}"> <i class="menu-icon fa fa-id-card-o"></i>Prijave</a>
            </li>
            <li>
                <a href="{{ url('/upisi/smjerovi') }}"> <i class="menu-icon fa fa-tasks"></i>Smjerovi</a>
            </li>
            <li>
                <a href="{{ url('upisi/predmeti') }}"> <i class="menu-icon fa fa-tasks"></i>Predmeti</a>
            </li>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>
