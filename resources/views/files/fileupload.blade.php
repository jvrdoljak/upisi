@extends('layouts.upisi')
@section('leftPanel')
  <div class="row" style="color:white;">
      <div class="col-lg-12 margin-tb">
          <div class="pull-left">
              <h2>Treći korak upisa u srednju školu</h2>
              <hr>
              <p>U trećem, odnosno zadnjem koraku, svi traženi dokumenti moraju biti priloženi, ukoliko neki od
                dokumenata ne bude priložen prijava će se smatrati nevažećom.
              </p>
          </div>
      </div>
  </div>
@stop
@section('content')
@if($message = Session::get('success'))
<div class="col-sm-12">
    <div class="alert  alert-success alert-dismissible fade show" role="alert">
        {{ $message }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif
@if($error = Session::get('error'))
<div class="col-sm-12">
    <div class="alert  alert-danger alert-dismissible fade show" role="alert">
        {{ $error }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif
@if($errors->any())
  <div class="alert alert-danger" role="alert">
    <p>{{ $errors->first() }}</p>
  </div>
@else

  {!! Form::open(array('route' => 'files.store', 'method'=>'POST', 'files' => true, 'enctype' => 'multipart/form-data')) !!}
      {{ csrf_field() }}

      @foreach($files as $file)
        {{ Form::label("file", $file['message']) }}
        {{ Form::file($file['name'], array('class' => 'form-control')) }}
        {{ Form::select('prijava_id', array($id => $id), null, array('class' => 'form-control', 'style' => 'display:none;')) }}
        <hr>
      @endforeach
      {{ Form::submit('Priloži', array('class' => 'btn btn-primary form-control mt-2')) }}
  {!! Form::close() !!}
@endif
@endsection
 