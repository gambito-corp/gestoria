<?php

namespace App\Http\Controllers;

use App\contacto;
use Illuminate\Http\Request;
use App\seccion;
use App\categoria;
use App\blog;
use App\config;

class ContactoController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $secciones = seccion::all();
        $categorias = categoria::all();
        $blogs = blog::all();
        $contactos = contacto::all();
        $config = config::find('1');
        return view('contacto.gestion', [
            'secciones' => $secciones,
            'categorias' => $categorias,
            'blogs' => $blogs,
            'contactos' => $contactos,
            'con' => $config
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $secciones = seccion::all();
        $categorias = categoria::all();
        $blogs = blog::all();
        $config = config::find('1');
        return view('contacto.crear', [
            'secciones' => $secciones,
            'categorias' => $categorias,
            'blogs' => $blogs,
            'con' => $config
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //validar datos
        $validate = $this->validate($request, [
            'nombre' => 'required',
            'email' => 'required|email',
            'telefono' => 'required|integer',
            'asunto' => 'required',
            'consulta' => 'required',
        ]);
        //pasarlos a variables
        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
        $email = $request->input('email');
        $telefono = $request->input('telefono');
        $asunto = $request->input('asunto');
        $consulta = $request->input('consulta');
        //crear objeto
        $contacto = new contacto();
        //setear objeto
        $contacto->nombre = $nombre;
        $contacto->apellido = $apellido;
        $contacto->correo = $email;
        $contacto->asunto = $asunto;
        $contacto->telefono = $telefono;
        $contacto->mensaje = $consulta;
        //guardar
        $save = $contacto->save();
        //redirigir
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $secciones = seccion::all();
        $categorias = categoria::all();
        $blogs = blog::all();
        $contacto = contacto::find($id);
        $config = App\config::find('1');
        return view('contacto.editar', [
            'secciones' => $secciones,
            'categorias' => $categorias,
            'blogs' => $blogs,
            'contacto' => $contacto,
            'con' => $config
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        //pasar a variables
        $id = $request->input('id');
        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
        $email = $request->input('email');
        $telefono = $request->input('telefono');
        $asunto = $request->input('area');
        $consulta = $request->input('mensaje');
        $solucion = $request->input('solucion');

        //encontrar objeto
        $contacto = contacto::find($id);
        $fecha_A = date('d-m-Y');
        $fecha = date('d-m-Y', strtotime($fecha_A . "+ 1 week"));

        //setearlo
        $contacto->nombre = $nombre;
        $contacto->apellido = $apellido;
        $contacto->correo = $email;
        $contacto->asunto = $asunto;
        $contacto->telefono = $telefono;
        $contacto->mensaje = $consulta;
        $contacto->solucion = $solucion;
        $contacto->rellamar_en = $fecha;
//guardar
        $save = $contacto->update();
        //redirigir
        if ($save) {
            //save correcto
            return redirect()->route('contacto.gestion')
                            ->with(['message' => 'Consulta actualizada con exito']);
        } else {
            //save incorrecto
            return redirect()->route('contacto.gestion')
                            ->with(['message' => 'Consulta no actualizada, Completa todos los datos obligatorios porfavor']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\contacto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $contacto = contacto::find($id);
        $save = $contacto->delete();
        if ($save) {
            //save correcto
            return redirect()->route('contacto.gestion')
                            ->with(['message' => 'Consulta eliminada con exito']);
        } else {
            //save incorrecto
            return redirect()->route('contacto.gestion')
                            ->with(['message' => 'Consulta no eliminada']);
        }
    }

}
