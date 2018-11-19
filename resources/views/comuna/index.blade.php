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
					<div class="pull-left"><h3>Lista de Comunas</h3></div>
					<div class="pull-right">
						<div class="btn-group">
							<a href="{{ route('comuna.create') }}" class="btn btn-info" >Añadir Comuna</a>
						</div>
					</div>
					<div class="table-container">
						<table id="mytable" class="table table-bordred table-striped">
							<thead>
								<th>#</th>
								<th>Nombre</th>
								<th>Descripcion</th>
								<th>Precio</th>
								<th>Distancia</th>
								<th>Coordenadas</th>
								{{-- <th>Modificar</th> --}}
								<th>Eliminar</th>
							</thead>
							<tbody>
								@if($comunas->isNotEmpty())
									@foreach($comunas as $comuna)  
										<tr>
											<td>{{ $loop->iteration }}</td>
											<td>{{ $comuna->name }}</td>
											<td>{{ $comuna->description }}</td>
											<td>{{ $comuna->price }}</td>
											<td>{{ $comuna->distance }}</td>
											<td>{{ $comuna->coords }}</td>
											{{--
											<td><a class="btn btn-primary btn-xs" href="{{action('ComunaController@edit', $comuna->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
											--}}
											<td>
												<form action="{{action('ComunaController@destroy', $comuna->id)}}" method="post">
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