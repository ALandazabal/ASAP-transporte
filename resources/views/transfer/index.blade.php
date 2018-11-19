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
					<div class="pull-left"><h3>Lista Transfers</h3></div>
					<div class="table-container">
						<table id="mytable" class="table table-bordred table-striped">
							<thead>
								<th>#</th>
								<th>Login</th>
								<th>Email</th>
								<th>Vehículo</th>
								<th>Destino</th>
								<th>Modificar</th>
							</thead>
							<tbody>
								@if($transfers->isNotEmpty())
									@foreach($transfers as $transfer)  
										<tr>
											<th>{{ $transfer->id }}</th>
											<td>{{ $transfer->user->name }}</td>
											<td>{{ $transfer->email }}</td>
											<td>{{ $transfer->vehicle->description }}</td>
											<td>{{ $transfer->comuna->name }}</td>
											<td><a class="btn btn-primary btn-xs" href="{{action('TransferController@edit', $transfer->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a>
											</td>
										</tr>
									@endforeach 
								@else
								<tr>
									<td colspan="8">No hay registros !!</td>
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