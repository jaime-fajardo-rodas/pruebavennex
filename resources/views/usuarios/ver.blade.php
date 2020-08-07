@extends('layout/plantilla')
@section('content')
    <div>
        <a href="{{ url('usuarios')}}" class="btn btn-info pull-right"> << Atrás </a>
        <h1>Ver Usuario</h1>
    </div>
    <hr>
    <form class="form-horizontal">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <div class="col-sm-10">
                        <img src="{{asset('img/'.$usuario->foto)}}" class="img-rounded img-responsive">
                    </div>
                </div>    
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="tipo_identificacion_id" class="col-sm-2 control-label">Tipo identificación</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tipo_identificacion_id" placeholder="{{$usuario->identificacion->descripcion}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="numero_identificacion" class="col-sm-2 control-label">Número identificación</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" placeholder="{{$usuario->numero_identificacion}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nombres" class="col-sm-2 control-label">Nombres</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nombres" placeholder="{{$usuario->nombres}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="apellidos" class="col-sm-2 control-label">Apellidos</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="apellidos" placeholder="{{$usuario->apellidos}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="telefono" class="col-sm-2 control-label">Teléfono</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="telefono" placeholder="{{$usuario->telefono}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="correo_electronico" class="col-sm-2 control-label">Correo electrónico</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="correo_electronico" placeholder="{{$usuario->correo_electronico}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="fecha_nacimiento" class="col-sm-2 control-label">Fecha nacimiento</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="fecha_nacimiento" placeholder="{{$usuario->fecha_nacimiento}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="recibir_boletin" class="col-sm-2 control-label">Recibir boletín</label>
                    <div class="col-sm-1">
                        <input type="checkbox" class="form-control" id="recibir_boletin" disabled="disabled"
                        @if($usuario->recibir_boletin == 1) checked=checked @endif
                        >
                    </div>
                </div>
                <div class="form-group">
                    <label for="observaciones_generales" class="col-sm-2 control-label">Observaciones generales</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="observaciones_generales" rows="10" style="resize: none; text-align:justify;" readonly>{{$usuario->observaciones_generales}}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </form>
@stop
