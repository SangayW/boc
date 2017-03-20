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
              <div class="text-muted bootstrap-admin-box-title clearfix">Edit management committee member
              </div>
            </div>
            <div class="bootstrap-admin-panel-content">
                    <ul class='nav nav-pills nav-justified'>
                      <li id='org_info'><a href="#Org-info" data-toggle="tab">Organization Information</a></li>
                      <li class='active'><a href="#Contact-info" data-toggle="tab">Contact Person Information</a></li>
                      <li id='management_info'><a href="#Management-info" data-toggle="tab">Management Committee Information</a></li>
                      <li><a href="#Advisory-info" data-toggle="tab">Advisory Board Information</a></li>
                    </ul>
                    <form action="{{route('contact_person.update',$contact->sport_org_contact_person_id)}}" method="post">
                      <div class='form-group'>
                          <input name="_method" type="hidden" value="PATCH">
                          {{csrf_field()}}
                      </div>
                      <div class='form-group'>
                        <label for='org_name' class='col-xs-2'>Contact Person</label>
                          <div class='col-xs-10 input-group'>
                            <input type="text" name="contact_name" class="form-control" placeholder="Enter organization name here" value="{{$contact->contact_person_name}}">
                          </div>
                      </div>
                      <div class='form-group'>
                          <label for='org_phone' class='col-xs-2'>Phone</label>
                          <div class='input-group col-xs-10'>
                            <input type="text" name="contact_phone" class="form-control" placeholder="enter phone number" value="{{$contact->contact_person_phone}}">
                          </div>
                      </div>
                      <div class='form-group'>
                          <label for='org_fax' class='col-xs-2'>Fax</label>
                          <div class='input-group col-xs-10'>
                            <input type="text" name="contact_fax" class="form-control" placeholder="enter fax number" value="{{$contact->contact_person_fax}}">
                          </div>
                      </div>
                      <div class='form-group'>
                          <label for='org_email' class='col-xs-2'>Email</label>
                          <div class='input-group col-xs-10'>
                            <input type="text" name="contact_email" class="form-control" placeholder="enter email" value="{{$contact->contact_person_email}}">
                          </div>
                      </div>
                      <div class='form-group'>
                          <label for='org_phone' class='col-xs-2'>Mobile</label>
                          <div class='input-group col-xs-10'>
                            <input type="text" name="contact_mobile" class="form-control" placeholder="enter phone number" value="{{$contact->contact_person_mobile}}">
                          </div>
                      </div>
                      <div class='form-group'>
                        <div class="col-xs-11 col-xs-offset-2 input-group">
                        <button type='submit' class='btn btn-default col-xs-2' name='update1' value='form1'>Update</button>
                        {{-- <a href="#Management-info" data-toggle="tab" class='btn btn-default col-xs-2 col-xs-offset-1 next2'>Next</a> --}}
                        <button type='submit' class='btn btn-default col-xs-2 col-xs-offset-1 next1' name='update1' value='form2'>Next</button>
                        <a href="#Management-info" data-toggle="tab" class='btn btn-default col-xs-2 col-xs-offset-1' id='skip'>Skip</a>
                          
                        <a href="{{route('sport_organization.index')}}" class='btn btn-default col-xs-2 col-xs-offset-1'> Cancel</a>
                      </div> 
                      </div>
                    </form>
                </div>
                <div class='tab-pane fade' id='Org-info'>
                   <script type="text/javascript">
                    $(function(){
                      $('#org_info').click(function(){
                          window.location="{{url(route('sport_organization.edit',$contact->sport_org_id))}}";
                      });
                    });
                    </script>
                </div>
                <div class='tab-pane fade' id='Management-info'></div>
                    <script type="text/javascript">
                    $(function(){
                      $('#management_info').click(function(){
                          window.location="{{url(route('management_committee.index'))}}";
                      });
                    });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function()
    {
      //navigation of active class from contact info to management tab on clicking next button
      $('#skip').click(function()
      {
        $('.nav #contact').removeClass('active');
        $('.nav #management').addClass('active');
        window.location="{{url(route('management_committee.index'))}}";
      });
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