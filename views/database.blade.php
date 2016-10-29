<?php use Vcord\Larastall\Http\Helpers\InputSetHelper; 
$err = new InputSetHelper();
?>
@extends('vendor.larastall.layout')
@section('title', 'Database Configuration')
@section('state', 'active')


@section('content')

<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default app-panel">
<div class="panel-heading">Database Configuration:</div>

  <div class="panel-body">
  @if(isset($db_error))
<div class="col-md-6 col-md-offset-3">
<div class="alert alert-danger">
       {{ $db_error }}
    </div>
    </div>
@endif
  <form action="{{route('larastall_database')}}" method="post" class="col-md-8 col-md-offset-2">
  <div class="form-group label-floating @if($err::seterror('db_host')) has-error @endif">
    <label for="host" class="control-label">Host</label>
    <input type="text" class="form-control"  name="db_host" placeholder="" value="localhost">
	@if($err::seterror('db_host'))
		 <span class="help-block">{{$err::seterror('db_host')}}</span>
	 @endif
  </div>
  
    <div class="form-group label-floating @if($err::seterror('db_name')) has-error @endif">
  <label for="database_name" class="control-label">Database Name</label>
    <input type="text" class="form-control" name="db_name" placeholder="">
	@if($err::seterror('db_name'))
		 <span class="help-block">{{$err::seterror('db_name')}}</span>
	 @endif
	</div>
	
	<div class="form-group label-floating @if($err::seterror('db_user')) has-error @endif">
  <label for="database_user" class="control-label">Database User</label>
    <input type="text" class="form-control" name="db_user"  id="database_user" placeholder="">
	@if($err::seterror('db_user'))
		 <span class="help-block">{{$err::seterror('db_user')}}</span>
	 @endif
	</div>
	
	<div class="form-group label-floating @if($err::seterror('db_password')) has-error @endif">
  <label for="database_password" class="control-label">Database Password</label>
    <input type="text" class="form-control" name="db_password" placeholder="">
	@if($err::seterror('db_password'))
		 <span class="help-block">{{$err::seterror('db_password')}}</span>
	 @endif
	</div>
  
  
  <br>
  </div>
  
  
  <div class="panel-footer">
  <a href="{{route('larastall_welcome')}}" class="btn btn-primary btn-raised">Previous</a>
  <button type="submit" class="btn btn-primary btn-raised pull-right">Next > Site Settings</button>
  </form>
  </div>
  
</div>
</div>
</div>

@endsection