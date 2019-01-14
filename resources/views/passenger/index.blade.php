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
					<div class="pull-left"><h3>Lista de Pasajeros</h3></div>
					<div class="pull-right">
						<div class="btn-group">
							<a href="{{ route('passenger.create') }}" class="btn btn-info" >Añadir Pasajero</a>
						</div>
					</div>
					<div class="table-container">
						<table id="mytable" class="table table-bordred table-striped">
							<thead>
								<th>#</th>
								<th>Descripcion</th>
								<th>Precio</th>
								<th>Modificar</th>
								<th>Eliminar</th>
							</thead>
							<tbody>
								@if($passengers->isNotEmpty())
									@foreach($passengers as $passenger)  
										<tr>
											<td>{{ $loop->iteration }}</td>
											<td>{{ $passenger->descripcion }}</td>
											<td>{{ $passenger->precio }}</td>
											
											<td><a class="btn btn-primary btn-xs" href="{{action('PassengerController@edit', $passenger->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
											
											<td>
												<form action="{{action('PassengerController@destroy', $passenger->id)}}" method="post">
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