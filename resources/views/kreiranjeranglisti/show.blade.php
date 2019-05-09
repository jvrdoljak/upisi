@extends('layouts.welcome')
@section('content')
    @include('welcome.includes.navigation')

    <div class="card">
        <div class="card-header">
        @if(isset($korisnici))
        <strong class="card-title">Rang lista od smjera {{ $nazivSmjera }}</strong>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Redni broj</th>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Ime oca</th>
                    <th>Prosjek</th>
                </tr>
                <?php $i = 0; ?>
                @foreach ($korisnici as $korisnik)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $korisnik[0]->ime }}</td>
                        <td>{{ $korisnik[0]->prezime }}</td>
                        <td>{{ $korisnik[0]->ime_oca }}</td>
                        <td>{{ $korisnik[0]->prosjek }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        @endif
    </div>

    @include('layouts.welcome.footer')
    @include('layouts.welcome.scrollToTop')
@stop
