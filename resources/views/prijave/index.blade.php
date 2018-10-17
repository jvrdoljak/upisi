@extends('layouts.upisi')

@section('leftPanel')
  @include('upisi.includes.navigation')
@stop

@section('content')
  <div class="card">
    <div class="card-header">
      <strong class="card-title">Prijave lista</strong>
    </div>

    <div class="card-body">
      @if ($message = Session::get('success'))
        <div class="alert alert-success">
          <p>{{ $message }}</p>
        </div>
      @endif

      <div class="row">
        <div class="col-lg-12 margin-tb">
          <div class="pull-right">
            <a class="btn btn-success" href="{{ route('prijave.create') }}"> Kreiraj novu prijavu</a>
          </div>
        </div>
      </div>
      <br>

      <table class="table table-bordered">
        <tr>
          <th>Id</th>
          <th>Ime</th>
          <th>Prezime</th>
          <th>Ime oca</th>
          <th width="280px">Akcija</th>
        </tr>
        @foreach ($prijave as $prijava)
          <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $prijava->ime }}</td>
            <td>{{ $prijava->prezime }}</td>
            <td>{{ $prijava->ime_oca }}</td>
            <td>
              <a class="btn btn-info" href="{{ route('prijave.show', $prijava->id) }}">Prikaz</a>
              <a class="btn btn-primary" href="{{ route('prijave.edit', $prijava->id) }}">Izmjena</a>

              {!! Form::open([
                'method' => 'DELETE',
                'route' => ['prijave.destroy', $prijava->id], 'style'=>'display:inline']
              ) !!}
              {!! Form::submit('Briši', ['class' => 'btn btn-danger']) !!}
              {!! Form::close() !!}
            </td>
          </tr>
        @endforeach
      </table>

      {!! $prijave->links() !!}
    </div>
  </div>
@endsection
