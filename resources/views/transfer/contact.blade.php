@extends('layouts.default')

@section('content')
<div class="container">
	<div class="col-md-4 col-md-offset-4" id="formContact">
		@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Error!</strong> Revise los campos obligatorios.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		@if(Session::has('success'))
		<div class="alert alert-info">
			{{Session::get('success')}}
		</div>
		@endif

		<div class="panel panel-default">
			<div class="panel-heading" id="formContactTitle">
				<h3 class="panel-title">Solicitud <br><sub>(Información de contacto)</sub></h3>
			</div>
			<div class="panel-body">					
				<div class="table-container">
					<form method="post" action="{{ route('transfer.store') }}"  role="form">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<label for="name">Nombre</label>
									<input type="text" class="form-control input-sm" name="name" value="{{ Auth::user()->name }}" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<label for="email">Correo Electrónico</label>
									<input type="email" class="form-control input-sm" name="email" value="{{ Auth::user()->email }}" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<label for="Date">Fecha de Búsqueda</label>
									<input type="date" class="form-control" name="date" required>
									<label for="Time">Hora de Búsqueda</label>
									<input type="time" class="form-control" name="time" required>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<div class="col-md-12">
										<label for="pago">Método de Pago</label>
									</div>
									<div class="col-md-6">
										<input type="radio" class="" name="pago" value="webpay"> WebPay+
									</div>						
									<div class="col-md-6">
										<input type="radio" class="" name="pago" value="paypal"> PayPal
									</div>						
								</div>
							</div>
						</div>

						{{-- Valores traidos del otro fomulario--}}
						<input type="hidden" name="comuna" value="{{ $form_data['comuna'] }}">
						<input type="hidden" name="vehicle" value="{{ $form_data['vehicle'] }}">

						<div class="row buttonSend">
							<div class="col-xs-12">
								<button class="btn btn-success" type="submit">Solicitar</button>
							</div>	
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection