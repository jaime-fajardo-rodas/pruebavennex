@extends('layout/plantilla')
@section('content')
<div class="container">
   <div class="row">
       <div class="col col-md-6 col-md-offset-3"   >
           <div class="panel panel-default">
             <div class="panel-heading"><h3 class="panel-title">Envió exitoso</h3></div>
             <div class="panel-body">
               <h4>El boletín ha sido enviado a los usuarios que aceptaron recibirlo.</h4>
             </div>
             <div class="panel-footer">
                 <a href="{{ url('usuarios')}}" class="btn btn-primary btn-xs "> Volver </a>
              </div>
           </div>
        </div>
   </div>
</div>
@endsection