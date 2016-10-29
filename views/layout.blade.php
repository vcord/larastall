<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>@yield('title')</title>
	
    <link href="{{asset('vendor/larastall/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/larastall/bootstrap-material-design.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/larastall/ripples.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/larastall/style.css')}}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  
 <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="{{route('larastall_welcome')}}">LaraStall Installer</a>
    </div>
  </div><!-- /.container-fluid -->
</nav>
	
	<div class="container">
	@yield('content')
	</div>
	
	
    <script src="{{asset('vendor/larastall/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/larastall/bootstrap.min.js')}}"></script>
	<script src="{{asset('vendor/larastall/material.min.js')}}"></script>
	<script src="{{asset('vendor/larastall/ripples.min.js')}}"></script>
	
    <script>
	$(document).ready(function(){
		$.material.init();
	});
	</script>
	
  </body>
</html>