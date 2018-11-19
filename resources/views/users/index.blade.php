@extends('layouts.users')
@section('content')
<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="pull-left"><h3>Lista Usuarios</h3></div>
					<div class="pull-right">
						<div class="btn-group">
							<a href="{{ route('users.create') }}" class="btn btn-info" >Añadir Usuario</a>
						</div>
					</div>
					<div class="table-container">
						<table id="mytable" class="table table-bordred table-striped">
							<thead>
								<th>#</th>
								<th>Nombre</th>
								<th>Email</th>
								<th>Tipo</th>
								<th>Modificar</th>
								<th>Eliminar</th>
							</thead>
							<tbody>
								@if($users->isNotEmpty())
									@foreach($users as $user)  
										<tr>
											<th>{{ $loop->iteration }}</th>
											<td>{{$user->name}}</td>
											<td>{{$user->email}}</td>
											<td>{{$user->role->name}}</td>
											<td><a class="btn btn-primary btn-xs" href="{{action('UsersController@edit', $user->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
											<td>
												<form action="{{action('UsersController@destroy', $user->id)}}" method="post">
												{{csrf_field()}}
													<input name="_method" type="hidden" value="DELETE">
													<button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
									
												</form>
											</td>
										</tr>
									@endforeach 
								@else
								<tr>
									<td colspan="8">No hay registro !!</td>
								</tr>
								@endif
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection