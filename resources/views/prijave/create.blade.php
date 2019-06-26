@extends('layouts.upisi')

@section('leftPanel')
    <div class="row" style="color:white;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Prvi korak upisa u srednju školu</h2>
                <hr>
                <p>Uneseni podaci se moraju podudarati s podacima u priloženim
                dokumentima i za te podatke garantirate materijalnom i kaznenom odgovornošću. </p>
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
    {!! Form::open(array('route' => 'prijave.store', 'method'=>'POST')) !!}
        @include('prijave.form')
    {!! Form::close() !!}
@stop
