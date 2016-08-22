@extends('baselayout')

@section('content')

<?php 
	$controller = "BookController";
	
	$colCss = "col-lg-4 col-md-4 col-xs-10";
	$btnCss = "col-lg-offset-4 col-md-offset-4";
	$msgCss = "col-xs-10 col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2";
	$msgTp  = "success";
	$msgHeader = "Information";	
	$btnSave = "Save";
	$btnSaveIcon = "floppy-disk";
	$btnSaveColor = "success";
	$formAction = action("$controller@postEdit");
	$cancelAction = action("$controller@getIndex");
	
	if (isset($IsDelete) && $IsDelete == true) {
		$msgHeader = "Confirmation";
		$msgTp   = "danger";
		$btnSave = "Delete";
		$btnSaveIcon = "remove-circle";
		$btnSaveColor = "danger";
		$formAction = action("$controller@postDelete");
	}
?>
	
<div class="row-responsive">	
	<?
	/*
	{!! Html::ul($errors->all(), array('class'=>'errors')) !!}

	{!! Form::open(array('url' => 'signin','class'=>'form-inline')) !!}

	{!! Form::label('email', 'E-Mail Address') !!}
	{!! Form::text('email', 'example@gmail .com', array('class' => 'form-control')) !!}
	{!! Form::label('password', 'Password') !!}
	{!! Form::password('password', array('class' => 'form-control')) !!}

	{!! Form::submit('Sign In' , array('class' => 'btn btn-primary')) !!}
	{!! Form::close() !!}
	
	See: https://laravel.com/docs/5.1/blade
	*/
	?>
	<div>
		<h1>English Books</h1>	
	</div>
</div>
@if(isset($message))
<div class="row-responsive">
	<div class="{{$msgCss}}">
		<div class="panel panel-{{$msgTp}}">
			<div class="panel-heading">{{$msgHeader}}</div>
			<div class="panel-body">{{$message}}</div>	  
		</div>	
	</div>
</div>
@endif

<div class="row-responsive">	
	<form method="POST" action="{{$formAction}}" class="form-horizontal">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group">
			<label for="id" class="{{$colCss}} control-label">Id</label>
			<div class="{{$colCss}}">		    
				<input type="text" name="id" id="id" disabled="true" class="form-control" value="{{$model->id}}" />
				<input type="hidden" name="id" id="id" value="{{$model->id}}" />
			</div>
		</div>
		<div class="form-group">
			<label for="name" class="{{$colCss}} control-label">Name</label>
			<div class="{{$colCss}}">	
			@if(isset($IsDelete) && $IsDelete == true)
				<input type="text" name="name" id="name" class="form-control" disabled="true" value="{{$model->name}}" />
				<input type="hidden" name="name" id="name" value="{{$model->name}}" />
			@else
				<input type="text" name="name" id="name" class="form-control" value="{{$model->name}}" />
			@endif
			</div>
		</div>
		<div class="form-group">
			<div class="{{$colCss}} {{$btnCss}}">	
				<button class="btn btn-{{$btnSaveColor}}"><span class="glyphicon glyphicon-{{$btnSaveIcon}}" aria-hidden="true"></span>&nbsp;{{$btnSave}}</button>
				<a href="{{$cancelAction}}" class="btn btn-default"><span class="glyphicon glyphicon-triangle-left" aria-hidden="true"></span>&nbsp;Cancel</a>
			</div>
		</div>
	</form>

</div>

@stop

