@extends('baselayout')

@section('content')

<?php 
	$controller = "LessonController";
	$Title      = "English Lesson";
	$colCss = "col-lg-4 col-md-4 col-xs-10";
	$btnCss = "col-lg-offset-4 col-md-offset-4";
	$msgCss = "col-xs-10 col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2";

	$cancelAction = action("$controller@getIndex");
?>
	
<div class="row-responsive">		
	<div>
		<h1>{{$Title}}</h1>		
	</div>
</div>
<div class="row-responsive">
	<div class="{{$msgCss}}">
		<div class="panel panel-danger">
			<div class="panel-heading">Record Deleted</div>
			<div class="panel-body">The English lesson with Id:<strong>{{$id}}</strong> and Name:<strong>{{$name}}</strong> was delete!</div>	  
		</div>	
	</div>
</div>
<div class="row-responsive">
	<div class="{{$colCss}} {{$btnCss}}">	
		<a href="{{$cancelAction}}" class="btn btn-default"><span class="glyphicon glyphicon-triangle-left" aria-hidden="true"></span>&nbsp;Return</a>
	</div>
</div>

@stop

