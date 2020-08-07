<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Usuario;

class MailController extends Controller
{
    public function index()
	{
	     return view('emails.correos');
	}

	public function send(Request $request)
	{
	   
	   $data = $request->all();
	   $asunto = $data['subject'];
	   $mensaje = $data['body'];

	   $datosUsuarios = Usuario::where("recibir_boletin","=",1)->select("correo_electronico")->get();
	   
	   foreach ($datosUsuarios as $key => $correo) {
	   	$destinatarios[$key] = $correo->correo_electronico;
	   }

	   
	   \Mail::send('emails.message', ["cuerpo"=>$mensaje], function($message) use ($destinatarios,$asunto)
	   {
	       //remitente
	       $message->from(env('REMITENTE'),env('NOMBRE_REMITENTE'));

	       //asunto
	       $message->subject($asunto);

	       //receptor
	       $message->to($destinatarios, '');

	   });
	   return View('emails.success');
	}
}
