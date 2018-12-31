@extends('layouts.users')
@section('content')
<div class="container">
	<div class="col-md-4 col-md-push-4 text-center">
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
			<div class="panel-heading">
				<h3 class="panel-title">Nuevo Usuario</h3>
			</div>
			<div class="panel-body">					
				<div class="table-container">
					<form method="POST" action="{{ route('users.store') }}"  role="form">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<input type="text" name="name" id="name" class="form-control input-sm" placeholder="Nombre del usuario">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<input type="email" name="email" id="email" class="form-control input-sm" placeholder="E-mail del usuario">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Contraseña del usuario">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<select class="form-control" name="role">
										@foreach( $roles as $role)
										<option value="{{ $role->id }}">{{ $role->name }}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<button class="btn btn-success" type="submit">Guardar</button>
								<a href="{{ route('users.index') }}" class="btn btn-info" >Atrás</a>
							</div>	
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection