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
              <div class="text-muted bootstrap-admin-box-title">SKRA Information
              </div>
            </div>
            <div class="bootstrap-admin-panel-content">
                 <form action="{{action('SKRAController@index')}}" method='get' id='view'>
                    {{csrf_field()}}
                    <div class='form-group'>
                      <label for='type' class='col-xs-2'>Sport Organization:</label>
                        <div class='col-xs-9 input-group'>
                          <select class='form-control' name='type'>
                            <?php 
                              $sports=App\Sport_Organization::all();
                              foreach($sports as $sport):
                            ?>
                            <option value="{{$sport->sport_org_id}}">{{$sport->sport_org_name}}</option>
                            <?php 
                              endforeach
                            ?>
                          </select>
                         <span class='input-group-btn'>
                            <button class='btn btn-default' type='submit' name='submit' value='view'>View</button>
                         </span>
                        </div>
                    </div>
                 </form>
                 @if(isset($_GET['submit']))
                  <script type="text/javascript">
                    $(function()
                    {
                        $('#view').hide();
                    });
                  </script>
                  <table class="table table-bordered table-striped table-responsive" id="table1">
                    <thead>
                        <tr>
                            <th>Sl. No:</th>
                            <th>SKRA Name</th>
                            <th>SKRA Description</th>
                            <th>Action</th>
                        </tr>   
                    </thead>
                    <tbody>
                        <?php $id=1?>
                        @foreach($skra as $skras)
                        @if($_GET['type']==$skras->sport_org_id)
                        <tr>
                            <td>{{$id++}}</td>
                            <td>{{$skras->SKRA_name}}</td>
                            <td>{{$skras->SKRA_description}}</td>
                            <td>
                                <form class="form-group" action="{{route('skra.destroy',$skras->skra_id)}}" method='post'>
                                  <input type="hidden" name="_method" value="delete">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                 {{--  <a href="{{route('skra.edit',$skras->skra_id)}}" class="btn btn-primary">Edit</a> --}}
                                 <a class="btn btn-info glyphicon glyphicon-edit" data-toggle='modal' data-target='#editModal' onclick='fun_edit({{$skras->skra_id}})'>Edit</a>
                                  <input type="submit" class="btn btn-warning" onclick="return confirm('Are you sure to delete this data');" name='name' value='Remove'>
                                </form>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                 </table>
                 <input type="hidden" name="hidden_view" id="hidden_view" value="{{route('view_skra')}}">
                 <div class='form-group clearfix'>
                  <div class="input-group pull-right" style='margin-top:10px'>
                    <button class='btn btn-success glyphicon glyphicon-plus' data-toggle='modal' data-target='#addModal'>Add</button>   
                  </div>
                </div>   
                 @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Add modal begins-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add SKRAs</h4>
      </div>
      <div class="modal-body">
        <form action="{{route('skra.store')}}" method="post">
          {{csrf_field()}}
          <div class='form-group'>
            <label for='type' class='col-xs-3'>Type</label>
              <div class='col-xs-9 input-group'>
                <select class='form-control' name='type'>
                      <?php 
                        $sports=App\Sport_Organization::all();
                        foreach($sports as $sport):
                      ?>
                      <option value="{{$sport->sport_org_id}}">{{$sport->sport_org_name}}</option>
                      <?php 
                        endforeach
                      ?>
                </select>
              </div>
          </div>
           <div class='form-group'>
              <label for='skra_name' class='col-xs-3'>SKRA Name</label>
                <div class='col-xs-9 input-group'>
                    <input type="text" name="skra_name" class="form-control" placeholder="Enter SKRA name here">
                </div>
          </div>
          <div class='form-group'>
            <label for='skra_description' class='col-xs-3'>SKRA Description</label>
              <div class='input-group col-xs-9'>
                  <textarea type='text' name="skra_description" class="form-control" rows=5 placeholder="enter skra description here"></textarea>
              </div>
        </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default glyphicon glyphicon-ok">Save</button>
        <button type="button" class="btn btn-default glyphicon glyphicon-remove" data-dismiss="modal">Cancel</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- addModal ends here -->
<!--editModal begins -->
<div class="modal fade" id="editModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit SKRA</h4>
      </div>
      <div class="modal-body">
         <form action="{{route('update_skra')}}" method="post">
           {{csrf_field()}}
           <div class='form-group'>
            <label for='type' class='col-xs-3'>Sport Organization</label>
                <div class='col-xs-9 input-group'>
                  <select class='form-control' name='type' id='type'>
                    <?php 
                      $sports=App\Sport_Organization::all();
                      foreach($sports as $sport):
                    ?>
                    <option value="{{$sport->sport_org_id}}">{{$sport->sport_org_name}}
                      </option>
                      <?php 
                    endforeach
                    ?>
                  </select>
                </div>
              <div class='clearfix'></div>
        </div>
         <div class='form-group'>
          <label for='skra_name' class='col-xs-3'>SKRA Name</label>
            <div class='col-xs-9 input-group'>
              <input type="text" name="skra_name" class="form-control" placeholder="Enter SKRA name here" id='skra_name'>
            </div>
      </div>
      <div class='form-group'>
          <label for='skra_description' class='col-xs-3'>SKRA Description</label>
            <div class='input-group col-xs-9'>
              <textarea type='text' name="skra_description" class="form-control" rows=5 placeholder="enter SKRA description here" id='skra_description'></textarea>
            </div>
      </div>
      <input type="hidden" id="edit_id" name="edit_id">
      <div class="modal-footer">
        <button type="submit" class="btn btn-info">Update</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- editModal ends here -->
<script type="text/javascript">
  $(function()
  {
    $('#table1').DataTable();
  });
  function fun_edit(id)
    {
      var view_url = $("#hidden_view").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          //console.log(result);
          $("#edit_id").val(result.skra_id);
          $("#type").val(result.sport_org_id);
          $("#skra_name").val(result.SKRA_name);
          $("#skra_description").val(result.SKRA_description);
        }
      });
    }
</script>
@endsection
@section('footer')
<div class="container">
    <div class="row">
        @include('includes.footer')
    </div>
</div>
@endsection

           