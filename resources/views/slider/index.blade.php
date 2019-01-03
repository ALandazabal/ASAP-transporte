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
					<div class="pull-left"><h3>Lista de Slides</h3></div>
					<div class="pull-right">
						<div class="btn-group">
							<a href="{{ route('sliderconfig.create') }}" class="btn btn-info" >Añadir Slide</a>
						</div>
					</div>
					<div class="table-container">
						<table id="mytable" class="table table-bordred table-striped">
							<thead>
								<th>#</th>
								<th>Título</th>
								<th>Descripción</th>
								<th>Imagen</th>
								{{-- <th>Slider</th> --}}
								<th>Modificar</th>
								<th>Eliminar</th>
							</thead>
							<tbody>
								@if($slides->isNotEmpty())
									@foreach($slides as $slide)  
										<tr>
											<td>{{ $loop->iteration }}</td>
											<td>{{ $slide->title }}</td>
											<td>{{ $slide->description }}</td>
											<td><img src="../img/carimages/{{ $slide->photo }}" width="50px" height="25px"></td>
											{{-- <td>
												@if( $slide->slider)
												<input type="checkbox" name="onSlider" checked>
												@else
												<input type="checkbox" name="onSlider">
												@endif
											</td> --}}
											<td><a class="btn btn-primary btn-xs" href="{{action('SliderController@edit', $slide->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
											<td>
												<form action="{{action('SliderController@destroy', $slide->id)}}" method="post">
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
{{-- <script type="text/javascript" async src="../js/index-slider.js"></script> --}}
@endsection