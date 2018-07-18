@extends('adminlte::page')
@section('title', 'AdminLTE LaraCMS')

@section('content_header')

    <h1>Users list</h1> 


     <div class="toolbar-widget list-header" id="Toolbar-listToolbar">
        <div class="control-toolbar">

            <!-- Control Panel -->
            <div class="toolbar-item toolbar-primary">
                <div data-control="toolbar" data-disposable="">
        <a  class="btn btn-primary oc-icon-plus" data-toggle="modal" data-target="#modal-create-user">
            {{trans('adminspringcms::springusersmanagement.create-new-user')}} </a>
                <a  class="btn btn-default oc-icon-address-card" data-toggle="modal" data-target="#modal-create-user" >
                Manage users </a>
            <a  class="btn btn-default oc-icon-group" data-toggle="modal" data-target="#modal-danger">
            Manage Groups    </a>
        </div>
            </div>
            
        </div>
    </div>
    @include('adminspringcms::Modals.alertlist')
    <div class="col-lg-13">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Inbox</h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <input type="text" class="form-control input-sm" placeholder="Search Mail">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                <div class="pull-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>User</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Reason</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                        <tr>
                          <td>{{$user->id}}</td>
                          <td>{{$user->name}}</td>
                          <td>{{$user->username}}</td>                      
                          <td>{{$user->created_at}}</td>
                          <td>{{$user->updated_at}}</td>
                          <td>
                               <div class="btn-group">
                                  <a href="#modal-delete-user" class="btn btn-default btn-sm" 
                                    data-toggle="modal" data-target="#modal-delete-user" 
                                 
                                    data-deleteurl="{{route('user.destroy', ['user' => $user->id])}}" 
                                    data-username="{{$user->username}}" ><i class="fa fa-trash-o"></i></a>
                                  <a href="active-users" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></a>

                                  <a href="#modal-edit-user" class="btn btn-default btn-sm" 
                                      data-toggle="modal" data-target="#modal-edit-user" 
                                     
                                      data-name="{{$user->name}}"
                                      data-editurl="{{ route('users.update', ['user' => $user->id])}}"
                                      data-username="{{$user->username}}" >
                                    <i class="fa fa-edit"></i></a>
                                </div>
                            
                          </td>
                        </tr>
                   @endforeach
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                <div class="pull-right">
                  {{ $users->links() }}
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
            </div>
          </div>
          <!-- /. box -->
        </div>          
@stop    



@section('adminlte_js')
    @include('adminspringcms::usersmanagement.Scripts.manage-users')  

    @include('adminspringcms::usersmanagement.Modals.delete')
    @include('adminspringcms::usersmanagement.Modals.edit')
    @include('adminspringcms::usersmanagement.Modals.create')
@stop

