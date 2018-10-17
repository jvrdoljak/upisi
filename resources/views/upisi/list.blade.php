@extends('layouts.upisi')

@section('leftPanel')
  @include('upisi.includes.navigation')
@stop

@section('content')
  @include('upisi.includes.header')
  @include('upisi.includes.breadcrumb', ['name' => 'Prijave lista', 'item' => 'lista'])

  <div class="card">
    <div class="card-header">
        <strong class="card-title">Prijave</strong>
    </div>
    <div class="card-body">
      <table id="bootstrap-data-table" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Salary</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Tiger Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>$320,800</td>
          </tr>
          <tr>
            <td>Hermione Butler</td>
            <td>Regional Director</td>
            <td>London</td>
            <td>$356,250</td>
          </tr>
          <tr>
            <td>Lael Greer</td>
            <td>Systems Administrator</td>
            <td>London</td>
            <td>$103,500</td>
          </tr>
          <tr>
            <td>Jonas Alexander</td>
            <td>Developer</td>
            <td>San Francisco</td>
            <td>$86,500</td>
          </tr>
          <tr>
            <td>Shad Decker</td>
            <td>Regional Director</td>
            <td>Edinburgh</td>
            <td>$183,000</td>
          </tr>
          <tr>
            <td>Michael Bruce</td>
            <td>Javascript Developer</td>
            <td>Singapore</td>
            <td>$183,000</td>
          </tr>
          <tr>
            <td>Donna Snider</td>
            <td>Customer Support</td>
            <td>New York</td>
            <td>$112,000</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
@stop