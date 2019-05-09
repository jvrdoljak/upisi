<div class="content mt-3">
    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
          <span class="badge badge-pill badge-success">Dobrodošli</span> Uspješno ste se prijavili na stranicu.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>

    <div class="col-sm-12 col-lg-4">
        <div class="card text-white bg-flat-color-1">
            <div class="card-body pb-0">
                <div class="dropdown float-right">
                    <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                        <i class="fa fa-cog"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <div class="dropdown-menu-content">
                            <a class="dropdown-item" href="{{ url('/upisi/prijave') }}">Pogledaj prijave</a>
                            <a class="dropdown-item" href="{{ url('/upisi/kreiranjeranglisti') }}">Pogledaj rang liste</a>
                        </div>
                    </div>
                </div>
                <h4 class="mb-0">
                    <span class="count">{{ $counts['prijava'] }}</span>
                </h4>
                <p class="text-light">Prijava</p>

                <div class="chart-wrapper px-0" style="height:70px;" height="70">
                    <canvas id="widgetChart1"></canvas>
                </div>

            </div>

        </div>
    </div>
    <!--/.col-->

    <div class="col-sm-12 col-lg-4">
        <div class="card text-white bg-flat-color-2">
            <div class="card-body pb-0">
                <div class="dropdown float-right">
                    <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                        <i class="fa fa-cog"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <div class="dropdown-menu-content">
                            <a class="dropdown-item" href="{{ url('/upisi/smjerovi') }}">Pogledaj listu smjerova</a>
                            <a class="dropdown-item" href="{{ url('/upisi/smjerovi/create') }}">Dodaj novi smjer</a>
                        </div>
                    </div>
                </div>
                <h4 class="mb-0">
                    <span class="count">{{ $counts['smjer'] }}</span>
                </h4>
                <p class="text-light">Smjerova</p>

                <div class="chart-wrapper px-0" style="height:70px;" height="70">
                    <canvas id="widgetChart2"></canvas>
                </div>

            </div>
        </div>
    </div>
    <!--/.col-->

    <div class="col-sm-12 col-lg-4">
        <div class="card text-white bg-flat-color-3">
            <div class="card-body pb-0">
                <div class="dropdown float-right">
                    <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                        <i class="fa fa-cog"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <div class="dropdown-menu-content">
                            <a class="dropdown-item" href="{{ url('/upisi/predmeti') }}">Pogledaj predmete</a>
                            <a class="dropdown-item" href="{{ url('/upisi/predmeti/create') }}">Dodaj novi predmet</a>
                        </div>
                    </div>
                </div>
                <h4 class="mb-0">
                    <span class="count">{{ $counts['predmet'] }}</span>
                </h4>
                <p class="text-light">Predmeta</p>

            </div>

                <div class="chart-wrapper px-0" style="height:70px;" height="70">
                    <canvas id="widgetChart3"></canvas>
                </div>
        </div>
    </div>
    <!--/.col-->
</div> <!-- .content -->
