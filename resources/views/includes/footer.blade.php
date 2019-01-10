<footer>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4 foot-box">
				<h3 class="title">CONTACTO</h3>
				<p>Dirección: <a href="https://goo.gl/maps/837aZ7UjTiE2">Eliodoro Yáñez 2876, Oficina 401. Providencia.</a></p>
				<p>Teléfono: <a href="tel:+56228668950">+56 2 2866 8950</a></p>
				<p>E-Mail: <a href="mailto:info@transportesasap.cl">info@transportesasap.cl</a></p>
			</div>
			<div class="col-md-4 foot-box">
				<a class="" href="{{ route('index') }}"><img class="footer-brand" alt="Brand" src="{{{ asset('img/logo-hor.png') }}}"></a>
			</div>
			<div class="col-md-4 foot-box">
				<h3 class="title">ENLACES DE INTERES</h3>
				<span>
					<p><a href="{{ route('index') }}">Inicio</a><br></p>
					<p><a href="servicio">Servicios</a><br></p>
					<p><a href="contacto">Contacto</a><br></p>
					{{-- <p><a href="info">Nosotros</a><br></p> --}}
					<p><a href="galeria">Galería</a><br></p>
				</span>
				{{-- <div class="col-md-6">
					<a href="#">
						<div class="social-item">
							<i class="fab fa-facebook-f"></i>
						</div>
					</a>
					<a href="#">
						<div class="social-item">
							<i class="fab fa-instagram"></i>
						</div>
					</a>
					<a href="#">
						<div class="social-item">
							<i class="fab fa-twitter"></i>
						</div>
					</a>
				</div> --}}
			</div>
			{{-- <div class="col-md-4 foot-box">
				<h4 class="title">GALERIA</h4>
				<img src="{{{ asset('img/carimages/1.jpg') }}}" class="mini">
				<img src="{{{ asset('img/carimages/2.jpg') }}}" class="mini">
				<img src="{{{ asset('img/carimages/3.jpg') }}}" class="mini">
				<img src="{{{ asset('img/carimages/4.jpg') }}}" class="mini">
			</div> --}}
		</div>
		<div class="row footer-copyright">
			Todos los derechos reservados ASAP - Servicio de Transporte © 2018 | Desarrollado por <a href="http://www.villartechnologies.com.ve/">Villartechnologies</a>
		</div>
	</div>
</footer>