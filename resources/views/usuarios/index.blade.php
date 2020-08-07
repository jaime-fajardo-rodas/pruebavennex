@extends('layout/plantilla')
@section('content')
 <h1>Listado Usuarios</h1>
 <a href="{{url('/boletin')}}" class="btn btn-success pull-left">Boletín</a>
 <a href="{{url('/usuarios/create')}}" class="btn btn-success pull-right">Crear Usuario</a>
 <br>
 <hr>
 <table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
         <th>Foto</th>
         <th>Tipo identificación</th>
         <th>Número identificación</th>
         <th>Nombres</th>
         <th>Apellidos</th>
         <th>Correo</th>
         <th colspan="2">Acciones</th>
     </tr>
     </thead>
     <tbody>
     @foreach ($usuarios as $usuario)
         <tr>
             <td><img src="{{ asset('img/'.$usuario->foto) }}" height="35" width="30"></td>
             <td>{{ $usuario->identificacion->descripcion }}</td>
             <td>{{ $usuario->numero_identificacion }}</td>
             <td>{{ $usuario->nombres }}</td>
             <td>{{ $usuario->apellidos }}</td>
             <td>{{ $usuario->correo_electronico }}</td>
             <td><a href="{{ url('usuarios', $usuario->id) }}" class="btn btn-primary">Ver</a></td>
             <td><a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-warning">Editar</a></td>
         </tr>
     @endforeach
     </tbody>
 </table>
@endsection
