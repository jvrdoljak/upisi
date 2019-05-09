<!-- Header -->
<header class="masthead d-flex">
  <div class="container text-center my-auto">
    @if (!empty($success))
        <div class="col-sm-12">
            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                <span class="badge badge-pill badge-success">Čestitamo</span> {{$success}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
    <h1 class="mb-1">Srednja strukovna škola</h1>
    <h3 class="mb-5">
      <em>Dobrodošli na stranicu</em>
    </h3>
    <a class="btn btn-primary btn-xl js-scroll-trigger" href="{{ url('/upisi/prijave/create') }}">Kreiraj svoju prijavu</a>
  </div>
  <div class="overlay"></div>
</header>
