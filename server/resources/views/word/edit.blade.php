@extends('baselayout')

@section('content')

<?php 
	$controller = "WordController";
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
			<label for="wordtype_id" class="{{$colCss}} control-label">Word Type</label>
			<div class="{{$colCss}}">	
				<select id="wordtype_id" name="wordtype_id" class="form-control">					
				@foreach($wordtypes as $item)
				  @if($item->id == $model->wordtype_id)
				  	<option value="{{$item->id}}" selected="selected">{{$item->name}}</td>
				  @else
					<option value="{{$item->id}}">{{$item->name}}</td>
				  @endif
				@endforeach	
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="book_id" class="{{$colCss}} control-label">Book</label>
			<div class="{{$colCss}}">	
				<select id="book_id" name="book_id" class="form-control">					
				@foreach($books as $item)
				  @if(($model->lesson_id > 0) && ($item->id == $model->lesson->book_id))
				  	<option value="{{$item->id}}" selected="selected">{{$item->name}}</td>
				  @else
					<option value="{{$item->id}}">{{$item->name}}</td>
				  @endif
				@endforeach	
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="lesson_id" class="{{$colCss}} control-label">Lesson</label>
			<div class="{{$colCss}}">	
				<select id="lesson_id" name="lesson_id" class="form-control">					
					<option>loading...</option>
				</select>
			</div>
		</div>
		
	
		<div class="form-group">
			<label for="english" class="{{$colCss}} control-label">English</label>
			<div class="{{$colCss}}">	
			@if(isset($IsDelete) && $IsDelete == true)
				<input type="text" name="english" id="english" class="form-control" disabled="true" value="{{$model->english}}" />
				<input type="hidden" name="english" id="english" value="{{$model->english}}" />
			@else
				<input type="text" name="english" id="english" class="form-control" value="{{$model->english}}" />
			@endif
			</div>
		</div>
		<div class="form-group">
			<label for="portuguese" class="{{$colCss}} control-label">Portuguese</label>
			<div class="{{$colCss}}">	
			@if(isset($IsDelete) && $IsDelete == true)
				<input type="text" name="portuguese" id="portuguese" class="form-control" disabled="true" value="{{$model->portuguese}}" />
				<input type="hidden" name="portuguese" id="portuguese" value="{{$model->portuguese}}" />
			@else
				<input type="text" name="portuguese" id="portuguese" class="form-control" value="{{$model->portuguese}}" />
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
<script type="text/javascript" src="{{asset('public/js/engapp.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function() {
		wordControllerInit({{$model->lesson_id}});
	});			
</script>
@stop

