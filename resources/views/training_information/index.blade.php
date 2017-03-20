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
              <div class="text-muted bootstrap-admin-box-title clearfix">Training Information
              </div>
            </div>
            <div class="bootstrap-admin-panel-content">
              <form action="{{--route('sport_organization.store')--}}" method="post">
                {{csrf_field()}}
                  <div class='form-group'>
                    <label for='ath_id' class='col-xs-2'>AthleteID </label>
                      <div class='col-xs-10 input-group'>
                        <input type="text" name="ath_id" class="form-control" placeholder="Enter athlate id here">
                      </div>
                  </div>
                  <div class='form-group'>
                    <label for='ath_name' class='col-xs-2'>Athlete Name </label>
                      <div class='col-xs-10 input-group'>
                        <input type="text" name="ath_name" class="form-control" placeholder="Enter athlate name here">
                      </div>
                  </div>
                  <div class='form-group'>
                    <label for='type' class='col-xs-2'>Sport</label>
                      <div class='col-xs-10 input-group'>
                        <select class='form-control' name='type'>
                          <option value="" disabled selected>Select sport</option>
                        </select>
                      </div>
                  </div>
                   <div class="form-group clearfix">
                    <div class="col-xs-12 input-group ">
                      <input type="submit" class="btn btn-default pull-right" value="Search">
                    </div>
                </div>
              </form>
               <table class="table table-bordered table-striped table-responsive" id="table1">
                 <thead>
                    <tr>
                        <th>Sl_no:</th>
                        <th>Sport</th>
                        <th>Athlete ID</th>
                        <th>Athlete Name</th>
                        <th>CID</th>
                        <th>DOB</th>
                        <th>Action</th>
                    </tr>   
                </thead>
                <tbody>
                 <?php $id=1?>
                  <tr>
                    <td>{{$id++}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <form class="form-group" action="{{--route('sport_organization.destroy',$sport->sport_org_id)--}}" method='post'>
                            <input type="hidden" name="_method" value="delete">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <a href="{{--route('sport_organization.edit',$sport->sport_org_id)--}}" class="btn btn-primary glyphicon glyphicon-edit">Edit</a>
                            <button type="submit" class="btn btn-danger glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete this data');" name='name'>Remove
                            </button>
                        </form>
                    </td>
                  </tr>
              </tbody>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(function(){
      
      $('#table1').DataTable();
  });
</script>
@endsection
@section('footer')
<div class="container">
 <div class="row">
  @include('includes.footer')
  </div>
</div>
@endsection