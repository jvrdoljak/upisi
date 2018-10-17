@extends('layouts.upisi')

@section('leftPanel')
  @include('upisi.includes.navigation')
@stop

@section('content')
  <div class="card">
    <div class="card-header">
      <strong class="card-title">Predmeti lista</strong>
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
            <a class="btn btn-success" href="{{ route('predmeti.create') }}"> Kreiraj novi predmet</a>
          </div>
        </div>
      </div>
      <br>

      <table class="table table-bordered">
        <tr>
          <th>Id</th>
          <th>Naziv</th>
          <th width="280px">Action</th>
        </tr>
        @foreach ($predmeti as $predmet)
          <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $predmet->naziv }}</td>
            <td>
              <a class="btn btn-info" href="{{ route('predmeti.show', $predmet->id) }}">Prikaz</a>
              <a class="btn btn-primary" href="{{ route('predmeti.edit', $predmet->id) }}">Izmjena</a>

              {!! Form::open([
                'method' => 'DELETE',
                'route' => ['predmeti.destroy', $predmet->id], 'style'=>'display:inline']
              ) !!}
              {!! Form::submit('Briši', ['class' => 'btn btn-danger']) !!}
              {!! Form::close() !!}
            </td>
          </tr>
        @endforeach
      </table>

      {!! $predmeti->links() !!}
    </div>
  </div>
@endsection
