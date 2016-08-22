@extends('baselayout')

@section('content')

<div class="row">
	<h1>Seja bem vindo ao Minha Escola Melhor</h1>
	<p>Nós queremos entender melhor as suas necessidades para melhorar a sua escola </p>
	<p>Este aplicativo foi desenvolvimento em parceria com o Tribunal de Contas da União (TCU) visando o bem estar social, 
	neste caso por meio da educação.</p>  
	<br/>
	<p>São poucas categorias e levará pouco tempo para dar sua avaliação e se não quiser responder tudo você pode responder apenas as que deseja.</p>
	<br/>
	<p><b>Vamos começa? </b></p>
	<p>Clique em <a href="{{action('Auth\AuthController@getRegister')}}">Registrar</a> para se cadastrar ou em
	<a href="{{action('Auth\AuthController@getLogin')}}">Login</a> se já tiver cadastro.
	</p>
</div>

@stop
