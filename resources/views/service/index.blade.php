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
					<div class="pull-left"><h3>Lista de Servicios Adicionales</h3></div>
					<div class="pull-right">
						<div class="btn-group">
							<a href="{{ route('service.create') }}" class="btn btn-info" >Añadir Servicio Adicional</a>
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
								@if($services->isNotEmpty())
									@foreach($services as $service)  
										<tr>
											<td>{{ $loop->iteration }}</td>
											<td>{{ $service->descripcion }}</td>
											<td>{{ $service->price }}</td>
											
											<td><a class="btn btn-primary btn-xs" href="{{action('ServiceController@edit', $service->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
											
											<td>
												<form action="{{action('ServiceController@destroy', $service->id)}}" method="post">
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