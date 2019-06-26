@extends('layouts.welcome')
@section('content')
    @include('welcome.includes.navigation')

    <div class="card">
        <div class="card-header">
        @if(isset($prijave))
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
                <?php $i = 0;?>

                @foreach ($prijave as $prijava)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $prijava->ime }}</td>
                        <td>{{ $prijava->prezime }}</td>
                        <td>{{ $prijava->ime_oca }}</td>
                        <td>{{ $prijava->prosjek }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        @elseif($errors->any())
            <div class="alert alert-danger" role="alert">
                <p>{{ $errors->first() }}</p>
            </div>
        @endif

    </div>

    @include('layouts.welcome.footer')
    @include('layouts.welcome.scrollToTop')
@stop
