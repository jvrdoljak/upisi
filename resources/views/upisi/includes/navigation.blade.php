<nav class="navbar navbar-expand-sm navbar-default">
    <div class="navbar-header">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand" href="./"><img src="{{ asset('upisi/images/logo.png') }}" alt="Logo"></a>
        <a class="navbar-brand hidden" href="./"><img src="{{ asset('upisi/images/logo2.png') }}" alt="Logo"></a>
    </div>

    <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="active">
                <a href="{{ url('/') }}"> <i class="menu-icon fa fa-dashboard"></i>Povratak na naslovnicu</a>
            </li>
            <li class="active">
                <a href="{{ url('/upisi/dashboard') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
            </li>

            <h3 class="menu-title">Prijave (ovo minjamo)</h3><!-- /.menu-title -->
            <!-- li>
                <a href="widgets.html"> <i class="menu-icon ti-email"></i>Nova prijava</a>
            </li -->
            <!-- li>
                <a href="{{ url('upisi/list') }}"> <i class="menu-icon fa fa-table"></i>Lista</a>
            </li -->
            <!-- li>
                <a href="widgets.html"> <i class="menu-icon fa fa-th"></i>Obrada</a>
            </li -->

            <h3 class="menu-title">Stavke</h3><!-- /.menu-title -->
            <li>
                <a href="{{ url('/upisi/prijave') }}"> <i class="menu-icon fa fa-id-card-o"></i>Prijave</a>
            </li>
            <li>
                <a href="{{ url('/upisi/smjerovi') }}"> <i class="menu-icon fa fa-tasks"></i>Smjerovi</a>
            </li>
            <li>
                <a href="{{ url('upisi/predmeti') }}"> <i class="menu-icon ti-email"></i>Predmeti</a>
            </li>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>