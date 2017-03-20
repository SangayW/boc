@extends('layouts.app')
@section('nav-bar')
@include('includes.header')
@endsection
@section('side-bar')
<div class="container">
    <div class="row">
        @include('includes.sidebar')
    </div>
</div>
@endsection
@section('content')
<div class="container">
  <div class="row">
    <!-- content -->
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="text-muted bootstrap-admin-box-title clearfix">Athlete Details
              </div>
            </div>
            <div class="bootstrap-admin-panel-content">
              <div class="form-group">
                <strong>Description:</strong>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
