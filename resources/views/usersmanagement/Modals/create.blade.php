<div class="modal  fade" id="modal-create-user">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Create new user</h4>
      </div>
      <div class="modal-body">
	        <form action="{{route('users.store')}}" method="post">
	                {!! csrf_field() !!}
	              <div class="box-body">
	                <div class="form-group as-feedback {{ $errors->has('name') ? 'has-error' : '' }} ">
	                  <label>Full name</label>
	                  <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter your name..." >
	                  @if ($errors->has('name'))
	                        <span class="help-block">
	                            <strong>{{ $errors->first('name') }}</strong>
	                        </span>
	                  @endif
	                </div>
	                <div class="form-group has-feedback {{ $errors->has('username') ? 'has-error' : '' }}">
	                  <label for="exampleInputEmail1">User name</label>
	                  <input type="text" name="username" value="{{ old('username') }}"  class="form-control" id="username" placeholder="Enter user name">
	                  @if ($errors->has('username'))
	                        <span class="help-block">
	                            <strong>{{ $errors->first('username') }}</strong>
	                        </span>
	                  @endif
	                </div>
	                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
	                  <label for="exampleInputPassword1">Password</label>
	                  <input type="password" name="password"  class="form-control" id="exampleInputPassword1" placeholder="Password">
	                  @if ($errors->has('password'))
	                        <span class="help-block">
	                            <strong>{{ $errors->first('password') }}</strong>
	                        </span>
	                  @endif
	                </div>  
	                <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
	                  <label for="exampleInputPassword1">Password confirmation</label>
	                  <input type="password" name="password_confirmation"  class="form-control" id="exampleInputPassword1" placeholder="password confirmation">
	                  @if ($errors->has('password_confirmation'))
	                        <span class="help-block">
	                            <strong>{{ $errors->first('password_confirmation') }}</strong>
	                        </span>
	                  @endif
	                </div> 

	              </div>
	              <!-- /.box-body -->	            
	             <div class="modal-footer">
	                <button type="submit" class="btn btn-primary">Submit</button>
	                <button type="button"  class="btn btn-default" data-dismiss="modal"  >Close</a>
	              </div>
	            </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@if($errors->any())
	@section('adminlte_js')
		<script>
			//alert("alog");
			$('#modal-create-user').modal();
		</script>  
	@stop
@endif