@extends('layouts.users')
@section('content')
<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
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
					<h3 class="panel-title">Editar Usuario</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('users.update', $user->id) }}"  role="form">
							{{ csrf_field() }}
							<input name="_method" type="hidden" value="PATCH">
							<div class="row">
								<div class="col-xs-12">
									<div class="form-group">
										<input type="text" name="name" id="name" class="form-control input-sm" value="{{ $user->name }}">
									</div>
								</div>
								<div class="col-xs-12">
									<div class="form-group">
										<input type="email" name="email" id="email" class="form-control input-sm" value="{{ $user->email }}">
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<div class="form-group">
											<select class="form-control" name="role">
											@if ( $user->isAdmin() )
											<option value="1">Admin</option>
											<option value="2">User</option>
											@else
											<option value="2">User</option>
											<option value="1">Admin</option>
											@endif
											</select>
										</div>
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
	</section>
</div>
@endsection