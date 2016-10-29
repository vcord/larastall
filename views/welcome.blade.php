@extends('vendor.larastall.layout')
@section('title', 'Larastall Installer')

@section('content')

<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default app-panel">
<div class="panel-heading">System Requirements Check:</div>
  <div class="panel-body">
   @if($is_Php_updated)	
<div class="alert alert-success" role="alert">Your PHP VERSION is up to date</div>
@else
<div class="alert alert-danger" role="alert">Your PHP VERSION does not meet System requirements, please contact your host to upgrade your PHP VERSION to Version 5.6 upward.</div>
@endif


@if($is_Mbstring_Loaded)	
<div class="alert alert-success" role="alert">MBstring Extension is Enabled on your server.</div>
@else
<div class="alert alert-danger" role="alert">MBstring Extension is not Enabled on your server. Please Contact your Host to enable PHP MBstring Extension.</div>
@endif


@if($is_Openssl_Loaded)	
<div class="alert alert-success" role="alert">OpenSSL Extension is Enabled on your server.</div>
@else
<div class="alert alert-danger" role="alert">OpenSSL Extension is not Enabled on your server. Please Contact your Host to enable PHP OpenSSL Extension.</div>
@endif


@if($is_Pdo_Loaded)	
<div class="alert alert-success" role="alert">PDO Extension is Enabled on your server.</div>
@else
<div class="alert alert-danger" role="alert">PDO Extension is not Enabled on your server. Please Contact your Host to enable PHP PDO Extension.</div>
@endif

@if($is_Tokenizer_Loaded)	
<div class="alert alert-success" role="alert">Tokenizer Extension is Enabled on your server.</div>
@else
<div class="alert alert-danger" role="alert">Tokenizer Extension is not Enabled on your server. Please Contact your Host to enable PHP Tokenizer Extension.</div>
@endif
  </div>
  
  <div class="panel-footer">
  @if(!$errorExists)
	<a class="btn btn-primary btn-raised pull-right" href="{{route('larastall_database')}}">Next > Database settings</a>
	@else
		<a class="btn btn-primary btn-raised pull-right" href="javascript:;" disabled = "disabled">Next</a>
	@endif
  </div>
  
</div>
</div>
</div>

@endsection