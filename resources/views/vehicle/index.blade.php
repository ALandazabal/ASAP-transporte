@extends('layouts.default')
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
					<div class="pull-left"><h3>Lista de Vehículos</h3></div>
					<div class="pull-right">
						<div class="btn-group">
							<a href="{{ route('vehicle.create') }}" class="btn btn-info" >Añadir Vehículo</a>
						</div>
					</div>
					<div class="table-container">
						<table id="mytable" class="table table-bordred table-striped">
							<thead>
								<th>#</th>
								<th>Descripción</th>
								<th>Pasajeros</th>
								<th>Imagen</th>
								<th>Modificar</th>
								<th>Eliminar</th>
							</thead>
							<tbody>
								@if($cars->isNotEmpty())
									@foreach($cars as $car)  
										<tr>
											<td>{{ $loop->iteration }}</td>
											<td>{{ $car->description }}</td>
											<td>{{ $car->passengers }}</td>
											<td><img src="../img/carimages/{{ $car->photo }}" width="50px" height="25px"></td>
											<td><a class="btn btn-primary btn-xs" href="{{action('VehicleController@edit', $car->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
											<td>
												<form action="{{action('VehicleController@destroy', $car->id)}}" method="post">
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