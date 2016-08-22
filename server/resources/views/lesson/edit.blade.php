@extends('baselayout')

@section('content')

<?php 
	$controller = "LessonController";
	$Title      = "English Lesson";
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
	<div>
		<h1>{{$Title}}</h1>	
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
			<label for="book" class="{{$colCss}} control-label">Book</label>
			<div class="{{$colCss}}">	
				<select id="book_id" name="book_id" class="form-control">					
				@foreach($books as $item)
				  @if($item->id == $model->book_id)
				  	<option value="{{$item->id}}" selected="selected">{{$item->name}}</td>
				  @else
					<option value="{{$item->id}}">{{$item->name}}</td>
				  @endif
				@endforeach	
				</select>
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

