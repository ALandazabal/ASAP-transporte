@extends('layouts.default')
@section('pageTitle', 'Nuestros Servicios - ')
@section('content')
<div class="container-fluid cont cont-dark-grey cont-2 ext banner-serv ">
	<h1>Servicios</h1>
</div>
<div class="container-fluid cont-1 text-center ext">
    <div class="col-md-6">
    	<h3>Servicio de Transporte Turistico y Empresarial Inmejorable</h3>
    </div>
    <div class="col-md-6">
    	<span>Somos una empresa de transporte terrestre de pasajeros. Nos especializamos en ofrecer la mejor experiencia en servicios de traslados al aeropuerto, ademas una serie de alternativas de transporte  hacia diferentes destinos dentro y fuera de la Región Metropolitana.</span> 
    </div>
</div>
<div class="container-fluid cont-1 text-center ext">
	<div class="col-md-3 ">
        <div class="col-md-12 content-jumbotron">
    		<div class="jumbotron services jumboserv">
    			<i class="fas fa-plane-departure"></i>
        		<h4>Traslado Aeropuerto</h4>
        		<span>Traemos para ti servicio de traslado desde y hacia el aeropuerto de Santiago de Chile las 24 horas del día. Deja en nuestras manos la comodidad de tu traslado mientras disfrutas de tus viajes.</span>
        	</div>
        </div>
    </div>

    <div class="col-md-3 ">
        <div class="col-md-12 content-jumbotron">
    		<div class="jumbotron services jumboserv">
    			{{-- <img src="{{{ asset('img/serv2.jpg') }}}"> --}}
                <i class="fas fa-bus-alt"></i>
        		<h4>Tours</h4>
        		<span>Te invitamos a conocer Chile con nosotros. Sí tienes tiempo para conocer entre el norte, el sur, viñedos, casinos, centros de ski y más, nos gustaría acompañarte en tu momento de relajación y hacer realidad tu destino turístico.</span>
        	</div>
        </div>
    </div>

    <div class="col-md-3 ">
        <div class="col-md-12 content-jumbotron">            
            <div class="jumbotron services jumboserv">
                {{-- <img src="{{{ asset('img/serv3.jpg') }}}"> --}}
                <i class="fas fa-city"></i>
                <h4>Convenio Empresas</h4>
                <span>Ofrecemos el mejor servicio de traslado corporativo a ejecutivos de Santiago. En un mundo de negocios sabemos la importancia de la puntualidad y calidad para que los ejecutivos vivan la mejor experiencia del viaje.</span>
            </div>
        </div>
    </div>

    <div class="col-md-3 ">
        <div class="col-md-12 content-jumbotron">
    		<div class="jumbotron services jumboserv">
    			{{-- <img src="{{{ asset('img/serv4.jpg') }}}"> --}}
                <i class="fas fa-plus-circle"></i>
        		<h4>Otros</h4>
        		<span>Si tu plan es salir a comer en familia y no quieres estar con la presión de manejar y pasarla bien? nosotros nos encargamos de tu traslado.</span>
        	</div>
        </div>
    </div>
</div>
@endsection