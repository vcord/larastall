<?php use Vcord\Larastall\Http\Helpers\InputSetHelper; 
$err = new InputSetHelper();
?>
@extends('vendor.larastall.layout')
@section('title', 'Site Configuration')

@section('content')

<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default app-panel">
<div class="panel-heading">Site Configuration:</div>
  <div class="panel-body">
  
  <form action="{{route('larastall_site')}}" method="post" class="col-md-8 col-md-offset-2">
	
  <div class="form-group label-floating @if($err::seterror('site_name')) has-error @endif">
    <label for="host" class="control-label">Site Name</label>
    <input type="text" class="form-control"  placeholder="" name="site_name">
	@if($err::seterror('site_name'))
		 <span class="help-block">{{$err::seterror('site_name')}}</span>
	 @endif
  </div>
  
  <div class="form-group label-floating @if($err::seterror('site_url')) has-error @endif">
    <label for="host" class="control-label">Site Url</label>
    <input type="text" class="form-control"  value="{{url('/')}}" readonly name="site_url">
	@if($err::seterror('site_url'))
		 <span class="help-block">{{$err::seterror('site_url')}}</span>
	 @endif
  </div>
  
   <div class="form-group label-floating @if($err::seterror('site_description')) has-error @endif">
  <label for="database_name" class="control-label">Site Description</label>
    <textarea class="form-control" rows="4" placeholder="" name="site_description"></textarea>
	@if($err::seterror('site_description'))
		 <span class="help-block">{{$err::seterror('site_description')}}</span>
	 @endif
	</div>
	
	<br>
	<div class="form-group">
	<h3>Account Setting</h3>
	</div>
	<hr>
	
	<div class="form-group label-floating @if($err::seterror('username')) has-error @endif">
  <label for="database_name" class="control-label">Admin Username</label>
    <input type="text" class="form-control" placeholder="" name="username">
	@if($err::seterror('username'))
		 <span class="help-block">{{$err::seterror('username')}}</span>
	 @endif
	</div>
	
	<div class="form-group label-floating @if($err::seterror('email')) has-error @endif">
  <label for="database_name" class="control-label">Admin Email</label>
    <input type="email" class="form-control" placeholder="" name="email">
	@if($err::seterror('email'))
		 <span class="help-block">{{$err::seterror('email')}}</span>
	 @endif
	</div>
	
	<div class="form-group label-floating @if($err::seterror('password')) has-error @endif">
  <label for="database_name" class="control-label">Admin Password</label>
    <input type="password" class="form-control" placeholder="" name="password">
	@if($err::seterror('password'))
		 <span class="help-block">{{$err::seterror('password')}}</span>
	 @endif
	</div>
	
	<div class="form-group label-floating @if($err::seterror('c_password')) has-error @endif">
  <label for="database_name" class="control-label">Confirm Password</label>
    <input type="password" class="form-control" placeholder="" name="c_password">
	@if($err::seterror('c_password'))
		 <span class="help-block">{{$err::seterror('c_password')}}</span>
	 @endif
	</div>
	
	<br>
	<div class="form-group">
	<h3>Mail Configuration</h3>
	</div>
	<hr>
	
	<div class="form-group label-floating @if($err::seterror('mail_host')) has-error @endif">
	<label for="mail_host" class="control-label">Mail Host e.g smtp.yourwebsite.com</label>
    <input type="text" class="form-control" placeholder="" name="mail_host">
	@if($err::seterror('mail_host'))
		 <span class="help-block">{{$err::seterror('mail_host')}}</span>
	 @endif
	</div>
	
	<div class="form-group @if($err::seterror('mail_driver')) has-error @endif">
  <label for="mail_driver">Mail Driver</label>
  <select class="form-control" name="mail_driver">
  <option value="smtp" selected>Smtp</option>
  <option value="mail">Mail</option>
  <option value="sendmail">SendMail</option>
  <option value="mailgun">Mailgun</option>
  <option value="mandrill">Mandrill</option>
  <option value="ses">Ses</option>
  <option value="sparkpost">Sparkpost</option>
  <option value="log">Log</option>
	</select>
	@if($err::seterror('mail_driver'))
		 <span class="help-block">{{$err::seterror('mail_driver')}}</span>
	 @endif
	</div>
	
	<div class="form-group label-floating @if($err::seterror('mail_port')) has-error @endif">
	<label for="mail_driver" class="control-label">Mail Port e.g 587</label>
    <input type="text" class="form-control" placeholder="" name="mail_port">
	@if($err::seterror('mail_port'))
		 <span class="help-block">{{$err::seterror('mail_port')}}</span>
	 @endif
	</div>
	
	<div class="form-group label-floating @if($err::seterror('mail_username')) has-error @endif">
	<label for="mail_username" class="control-label">Mail username e.g user@yourwebsite.com</label>
    <input type="text" class="form-control" placeholder="" name="mail_username">
	@if($err::seterror('mail_username'))
		 <span class="help-block">{{$err::seterror('mail_username')}}</span>
	 @endif
	</div>
	
	<div class="form-group label-floating @if($err::seterror('mail_password')) has-error @endif">
  <label for="mail_password" class="control-label">Mail Password</label>
    <input type="password" class="form-control" placeholder="" name="mail_password">
	@if($err::seterror('mail_password'))
		 <span class="help-block">{{$err::seterror('mail_password')}}</span>
	 @endif
	</div>
	
	<div class="form-group @if($err::seterror('mail_encryption')) has-error @endif">
  <label for="mail_enc">Mail Encryption</label>
   <select class="form-control" name="mail_encryption">
  <option value="tls" selected>TLS</option>
  <option value="ssl">SSL</option>
</select>
@if($err::seterror('mail_encryption'))
		 <span class="help-block">{{$err::seterror('mail_encryption')}}</span>
	 @endif
	</div>
	
	<br>
  
  </div>
  
  <div class="panel-footer">
  <a href="{{route('larastall_database')}}" class="btn btn-primary btn-raised">Previous</a>
  <button type="submit" class="btn btn-primary btn-raised pull-right">Next > Finish</button>
  </form>
  </div>
  
</div>
</div>
</div>

@endsection