<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Desplegar navegación</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
 			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="{{ route('index') }}"><img class="logo" alt="Brand" src="{{{ asset('img/logo.png') }}}"></a>
	</div>
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav">
			<li class="{{ request()->is('/') ? 'active' : '' }}"><a href="/">Inicio</a></li>
			<li class="{{ request()->is('servicio') ? 'active' : '' }}"><a href="servicio">Nuestros Servicios</a></li>
			<li class="{{ request()->is('transfer/create') || request()->is('transfer/contact') ? 'active' : '' }}"><a href="{{ route('transfer.create') }}">Transfers</a></li>
			<li class="{{ request()->is('contacto') ? 'active' : '' }}"><a href="contacto">Contacto</a></li>
			<!--<li class="{{ request()->is('info') ? 'active' : '' }}"><a href="info">Nosotros</a></li>-->
		</ul>
		<ul class="nav navbar-nav navbar-right">
	        @guest
	            <li><a href="{{ route('login') }}">Inicia Sesion</a></li>
	            <li><a href="{{ route('register') }}">Registrarse</a></li>
	            @else
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
						{{ Auth::user()->name }} <span class="caret"></span>
					</a>

					<ul class="dropdown-menu">
						<li>
							<a href="{{ route('dashboard') }}">Dashboard</a>
						</li>
						<li>
	                        <a href="{{ route('logout') }}" onclick="
	                        event.preventDefault();
	                        document.getElementById('logout-form').submit();">
	                            Salir
	                        </a>

	                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                            {{ csrf_field() }}
	                        </form>
	                    </li>
	            	</ul>
				</li>
	        @endguest
	    </ul>
	</div>
</nav>