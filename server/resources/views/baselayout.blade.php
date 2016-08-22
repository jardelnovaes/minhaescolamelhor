
<?php //use Illuminate\Html\HtmlFacade; ?>
<?php use Collective\Html\HtmlFacade; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Minha Escola Melhor</title>
<?php /*
        {!! Html::style('css/app.css') !!}
        {!! Html::script('js/jquery.min.js') !!}
        {!! Html::script('js/bootstrap.min.js') !!}
*/?>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		
		<link href="{{asset('public/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
		<link href="{{asset('public/css/app.css')}}" rel="stylesheet" type="text/css"/>
		<script src="{{asset('public/js/jquery-2.2.1.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('public/bootstrap/js/bootstrap.min.js')}}"></script>
    </head>
	<body>
		<header>
			<nav class="navbar navbar-default navbar-static">
				<div class="container-fluid">
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="{{action('HomeController@index')}}">English App</a>
					</div>
					<div id="navbar" class="collapse navbar-collapse">
						<ul class="nav navbar-nav">
							<li><a href="{{action('WordTypeController@getIndex')}}">Word Types</a></li>
							<li><a href="{{action('BookController@getIndex')}}">Books</a></li>
							<li><a href="{{action('LessonController@getIndex')}}">Lessons</a></li>
							<li><a href="{{action('WordController@getIndex')}}">Words</a></li>
							
							<li><a href="">About</a></li>
							<li><a href="">Contact</a></li>
						</ul>
						
						<ul class="nav navbar-nav navbar-right">
							@if (Auth::guest())
								<li><a href="{{action('Auth\AuthController@getLogin')}}">Login</a></li>
								<li><a href="{{action('Auth\AuthController@getRegister')}}">Registrar</a></li>
							@else
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="{{action('Auth\AuthController@getLogout')}}">Logout</a></li>
									</ul>
								</li>
							@endif
						</ul>
					</div><!--/.nav-collapse -->
				</div>
			</nav>
		</header>
		<div class="col-lg-10 col-md-10 col-sm-1 col-xs-1">
			<div class="container-fluid">
				@yield('content')
			</div><!-- /.container -->
			<div class="row"></div>
		</div>    	
		<footer class="footer">
		  <div class="container">
			<p class="text-muted">Dev by: Jardel Novaes - Contact: <a href="mailto:jardelnovaes@hotmail.com"> jardelnovaes@hotmail.com</a></p>
		  </div>
		</footer>
	</body>
</html>
<?php
/*
$url = action('HomeController@getIndex', $params);
$url = route('routeName', $params);
*/
?>
	