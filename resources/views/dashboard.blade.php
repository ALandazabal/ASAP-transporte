
@extends('layouts.users')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body" id="dashboard">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if ( Auth::user()->isAdmin())
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title">Administrar Usuarios</h5>
                                </div>
                                <div class="panel-body">
                                    Añade, modifica, elimina los usuarios que tendrán acceso a la página.<br>
                                    <center>
                                    <a href="{{ route('users.index') }}" class="btn btn-default">Ir!</a>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title">Administrar Comunas</h5>
                                </div>
                                <div class="panel-body">
                                    Añade, modifica, elimina comunas.<br>
                                    <center>
                                    <a href="{{ route('comuna.index') }}" class="btn btn-default">Ir!</a>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title">Administrar Vehículos</h5>
                                </div>
                                <div class="panel-body">
                                    Añade, modifica, elimina vehículos para la disponibilidad del sistema.<br>
                                    <center>
                                    <a href="{{ route('vehicle.index') }}" class="btn btn-default">Ir!</a>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title">Administrar Transfers</h5>
                                </div>
                                <div class="panel-body">
                                    Visualizar o modificar las Transfers solicitadas por los usuarios.<br>
                                    <center>
                                    <a href="{{ route('transfer.index') }}" class="btn btn-default">Ir!</a>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title">Administrar Slider</h5>
                                </div>
                                <div class="panel-body">
                                    Añade, modifica, elimina items para mostrar en el slider de la página principal.<br>
                                    <center>
                                    <a href="{{ route('sliderconfig.index') }}" class="btn btn-default">Ir!</a>
                                    </center>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection