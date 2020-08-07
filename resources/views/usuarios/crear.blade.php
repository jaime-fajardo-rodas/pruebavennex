@extends('layout/plantilla')
@section('content')
    <div>
        <a href="{{ url('usuarios')}}" class="btn btn-info pull-right"> << Atras </a>
        <h1>Crear Usuario</h1>
    </div>
    <hr>
    <div class="row">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {!! Form::open(['url' => 'usuarios', 'files' => true]) !!}
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('Tipo identificación', 'Tipo identificación:') !!}
                {!! Form::select('tipo_identificacion_id',$identificaciones,['class' => 'form-control', 'required' => 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Número identificación', 'Número identificación:') !!}
                {!! Form::text('numero_identificacion',null,['class' => 'form-control', 'required' => 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Nombres', 'Nombres:') !!}
                {!! Form::text('nombres',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Apellidos', 'Apellidos:') !!}
                {!! Form::text('apellidos',null,['class' => 'form-control', 'required' => 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Teléfono', 'Teléfono:') !!}
                {!! Form::text('telefono',null,['class' => 'form-control', 'required' => 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Correo electrónico', 'Correo electrónico:') !!}
                {!! Form::text('correo_electronico',null,['class' => 'form-control', 'required' => 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Fecha nacimiento', 'Fecha nacimiento:') !!}
                {!! Form::date('fecha_nacimiento',null,['class' => 'form-control', 'required' => 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Recibir boletín', 'Recibir boletín:') !!}
                {!! Form::checkbox('recibir_boletin',null,['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Foto', 'Foto:') !!}
                {!! Form::file('foto',null,['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('Observaciones generales', 'Observaciones generales:') !!}
                {!! Form::textarea('observaciones_generales',null,['class' => 'form-control', 'rows' => '16', 'style' => 'resize: none; text-align:justify;']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary form-control']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@stop
