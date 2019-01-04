{{-- <nav class="navbar navbar-default navbar-fixed-top" role="navigation"> --}}
<nav class="navbar navbar-default navbar-custom" role="navigation">
	<div class="row sec-icon">
		<div class="col-md-12">
			<a href="https://www.instagram.com/asaptransporte/">
				<div class="social-item">
					{{-- <i class="fab fa-instagram"></i> --}}
					<img class="icon" alt="Brand" src="{{{ asset('img/redes/instag.png') }}}"> @asaptransporte
				</div>
			</a>
			<a href="#">
				<div class="social-item">
					{{-- <i class="fab fa-twitter"></i> --}}
					<img class="icon" alt="Brand" src="{{{ asset('img/redes/twitter.png') }}}">
				</div>
			</a>
			<a href="https://www.facebook.com/transferASAP/">
				<div class="social-item">
					{{-- <i class="fab fa-facebook-f"></i> --}}
					<img class="icon" alt="Brand" src="{{{ asset('img/redes/face.png') }}}"> @transferASAP
				</div>
			</a>
			<a href="https://api.whatsapp.com/send?phone=56228668950&text=Hola!%20Quiero%20solicitar%20el%20servicio%20de%20transfer/tour!">
				<div class="social-item">
					{{-- <i class="fab fa-facebook-f"></i> --}}
					<img class="icon" alt="Brand" src="{{{ asset('img/redes/wp.png') }}}"> +56 2 2866 8950
				</div>
			</a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Desplegar navegación</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
	 			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{ route('index') }}"><img class="logo" alt="Brand" src="{{{ asset('img/logo.png') }}}"></a>
		</div>
		<div class="col-md-5 collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav navbar-right">
		        @guest
		            <li><a href="{{ route('login') }}">Inicia Sesión</a></li>
		            <li><a href="{{ route('register') }}">Regístrate</a></li>
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
		    <ul class="nav navbar-nav navbar-right">
				<li class="{{ request()->is('/') ? 'active' : '' }}"><a href="/">Inicio</a></li>
				<li class="{{ request()->is('servicio') ? 'active' : '' }}"><a href="servicio">Nuestros Servicios</a></li>
				<li class="{{ request()->is('transfer/create') || request()->is('transfer/contact') ? 'active' : '' }}"><a href="{{ route('transfer.create') }}">Transfers</a></li>
				<li class="{{ request()->is('contacto') ? 'active' : '' }}"><a href="contacto">Contacto</a></li>
				<!--<li class="{{ request()->is('info') ? 'active' : '' }}"><a href="info">Nosotros</a></li>-->
			</ul>
		</div>
	</div>
</nav>