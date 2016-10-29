@extends('vendor.larastall.layout')
@section('title', 'Success')
@section('content')

<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default app-panel">
  <div class="panel-body text-center" >
  <h3 style="line-height:3;">Your Installation was successfull!</h3>
  
  <h4 style="line-height:2;">You must Delete Installation files and log into the Admin Panel by clicking the button below:</h4>
  </div>
  
  <div class="panel-footer">
   <form action="{{route('larastall_complete')}}" method="post">
  <button type="submit" class="btn btn-primary btn-raised pull-right">Delete files and login</button>
  </form>
 
  </div>
  
</div>
</div>
</div>

@endsection