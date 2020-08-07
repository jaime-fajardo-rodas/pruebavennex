<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;

use App\Usuario;
use App\Identificaciones;

class UsuarioController extends Controller
{
    public function index()
	{
	  $usuarios = Usuario::with('identificacion')->get();
	  return view('usuarios.index', compact('usuarios'));
	}

	public function show($id)
	{
	   $usuario = Usuario::with('identificacion')->find($id);
	   return view('usuarios.ver', compact('usuario'));
	}

	public function create()
	{
	   $identificaciones = Identificaciones::lists('descripcion','id');
	   return view('usuarios.crear',compact('identificaciones'));
	}

	public function store(Request $request)
	{
	  $usuario = $request->all();
	  
	  $validator = Validator::make($usuario, [
	    'tipo_identificacion_id'    => 'required',
	    'numero_identificacion'  	=> 'required|digits_between:1,13|numeric',
	    'nombres'    				=> 'required|max:30',
	    'apellidos'   				=> 'required|max:30',
	    'telefono'   				=> 'required|digits_between:1,10|numeric',
	    'correo_electronico'   		=> 'required|email',
	    'fecha_nacimiento'     		=> 'required|date',
	    'foto'    				    => 'mimes:jpg,jpeg,png',
	    'observaciones_generales'  	=> 'max:250'
	  ]);

	  if ($validator->fails()) {
	    return back()->withErrors($validator)->withInput();
	  } else {
	    if ($request->file('foto')) {
	      $usuario['foto'] = $request->file('foto')->getClientOriginalName();
	      $request->file('foto')->move(public_path('img'), $usuario['foto']);
	    }else{
	      $usuario['foto'] = 'default';
	    }

	    if (isset($usuario['recibir_boletin'])) {
	    	$usuario['recibir_boletin'] = 1;
	    }else{
	    	$usuario['recibir_boletin'] = 0;
	    }

	    Usuario::create($usuario);
	    return redirect('usuarios');    
	  }
	}

	public function edit($id)
	{
	   $usuario = Usuario::find($id);
	   $identificaciones = Identificaciones::lists('descripcion','id');
	   return view('usuarios.editar', compact('usuario','identificaciones'));
	}

	public function update(Request $request, $id)
    {
        $nuevosDatosUsuario = $request->all();
        $usuario = Usuario::find($id);

        $validator = Validator::make($nuevosDatosUsuario, [
	    'tipo_identificacion_id'    => 'required',
	    'numero_identificacion'  	=> 'required|max:13',
	    'nombres'    				=> 'required|max:30',
	    'apellidos'   				=> 'required|max:30',
	    'telefono'   				=> 'required|max:10',
	    'correo_electronico'   		=> 'required',
	    'fecha_nacimiento'     		=> 'required|date',
	    'foto'    				    => 'mimes:jpg,jpeg,png',
	    'observaciones_generales'  	=> 'max:250'
	  ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            if ($request->file('foto')) {
                $nuevosDatosUsuario['foto'] = $request->file('foto')->getClientOriginalName();
                $request->file('foto')->move(public_path('img'), $nuevosDatosUsuario['foto']);
            }else{
                $nuevosDatosUsuario['foto'] = $nuevosDatosUsuario['fotoOriginal'];
            }

            if (isset($nuevosDatosUsuario['recibir_boletin'])) {
	    	$nuevosDatosUsuario['recibir_boletin'] = 1;
		    }else{
		    	$nuevosDatosUsuario['recibir_boletin'] = 0;
		    }

            $usuario->update($nuevosDatosUsuario);
            return redirect('usuarios');
        }
    }

}
