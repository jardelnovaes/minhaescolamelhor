@extends('baselayout')

@section('content')

<div class="row">		
	<h1>Word Types</h1>
</div>
<div class="row">	
	<div class="table-responsive">
	  <table class="table table-sm">
		<tr class="table-active">
			<th><a href="{{action('WordTypeController@getNewItem')}}" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;&nbsp;New</a></th>
			<th>Id</th>
			<th>Word Type</th>
		</tr>	
	@foreach($model as $item)	
		<tr> 
			<td>
				<a href="{{action('WordTypeController@getEdit', $item->id)}}" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
				<a href="{{action('WordTypeController@getDelete', $item->id)}}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
			</td>
			<td>{{$item->id}}</td>
			<td>{{$item->name}}</td>
		</tr>
	@endforeach
	  </table>
	</div>
</div>

@stop

