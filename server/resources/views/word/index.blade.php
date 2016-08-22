@extends('baselayout')

@section('content')

<div class="row">		
	<h1>English Words</h1>
</div>
<div class="row">	
	<div class="table-responsive">
	  <table class="table table-sm">
		<tr class="table-active">
			<th><a href="{{action('WordController@getNewItem')}}" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;&nbsp;New</a></th>
			<th>Id</th>
			<th>Book</th>
			<th>Lesson</th>
			<th>Word Type</th>
			<th>English</th>
			<th>Portuguese</th>
		</tr>	
	@foreach($model as $item)	
		<tr> 
			<td>
				<a href="{{action('WordController@getEdit', $item->id)}}" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
				<a href="{{action('WordController@getDelete', $item->id)}}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
			</td>
			<td>{{$item->id}}</td>
			<td>{{($item->lesson_id>0)? $item->lesson->book->name : ""}}</td>
			<td>{{($item->lesson_id>0)? $item->lesson->name : ""}}</td>			
			<td>{{($item->wordtype_id>0)? $item->wordtype->name : ""}}</td>			
			<td>{{$item->english}}</td>
			<td>{{$item->portuguese}}</td>
		</tr>
	@endforeach
	  </table>
	</div>
</div>

@stop

