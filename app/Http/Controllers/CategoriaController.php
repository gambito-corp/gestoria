<?php

namespace App\Http\Controllers;

use App\categoria;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
Use Faker\Provider\Image;
use App\seccion;
use App\User;
use App\config;

class CategoriaController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gestion() {        
        if(\Auth::user() && (\Auth::user()->role == 'socio' || \Auth::user()->role == 'admin' || \Auth::user()->role == 'Superadmin')){

            $categorias = categoria::all();
            return view('categoria.gestion', [
                'categorias' => $categorias
            ]);
        }else{
            return redirect()->route('index');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $secciones = seccion::orderBy('id', 'desc')->get();
        $categorias = \App\categoria::all();
        $blogs = \App\blog::all();
        return view('categoria.index', [
            'secciones' => $secciones,
            'categorias' => $categorias,
            'blogs' => $blogs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        if(\Auth::user() && (\Auth::user()->role == 'editor' || \Auth::user()->role == 'socio' || \Auth::user()->role == 'admin' || \Auth::user()->role == 'Superadmin')){

            return view('categoria.crear');
        }else{
            return redirect()->route('index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if(\Auth::user() && (\Auth::user()->role == 'editor' || \Auth::user()->role == 'socio' || \Auth::user()->role == 'admin' || \Auth::user()->role == 'Superadmin')){

            //validar datos
            $validate = $this->validate($request, [
                'titulo' => 'required',
                'descripcionC' => 'required',
                'descripcionL' => 'required',
                'imagen' => 'required|image',
                'metadesc' => 'required',
                'metatitle' => 'required',
                'metakey' => 'required'
            ]);
            //recoger los datos
            $titulo = $request->input('titulo');
            $imagen = $request->file('imagen');
            $descripcionC = $request->input('descripcionC');
            $descripcionL = $request->input('descripcionL');
            $metadesc = $request->input('metadesc');
            $metatitle = $request->input('metatitle');
            $metakey = $request->input('metakey');
            //cargar usuario
            $user = \Auth::user();
            $categoria = new categoria();
            //recibir imagen
            if ($imagen) {
                //poner nombre unico
                $imagen_name = time() . $imagen->getClientOriginalName();
                //guardamos en la carpeta users de storage/app/users
                Storage::disk('categorias')->put($imagen_name, File::get($imagen));
                //seteo el objeto
                $categoria->imagen = $imagen_name;
            }
            //setear objeto
            $categoria->user_id = $user->id;
            $categoria->titulo = $titulo;
            $categoria->descripcionC = $descripcionC;
            $categoria->descripcionL = $descripcionL;
            $categoria->metadesc = $metadesc;
            $categoria->metatitle = $metatitle;
            $categoria->metakey = $metakey;
            //guardar
            $save = $categoria->save();
            //redirigir
            if ($save) {
                return redirect()->route('categoria.gestion')->with([
                            'message' => 'categoria guardada exitosamente'
                ]);
            } else {
                return redirect()->route('categoria.gestion')->with([
                            'message' => 'fallo al guardar categoria'
                ]);
            }
        }else{
            return redirect()->route('index');
        }
    }

    public function getImagen($filename) {
        $file = Storage::disk('categorias')->get($filename);
        return new Response($file, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(categoria $categoria) {
        $secciones = seccion::orderBy('id', 'desc')->get();
        $categorias = \App\categoria::all();
        $blogs = \App\blog::all();
        $config = config::find('1');
        return view('categoria.index', [
            'secciones' => $secciones,
            'categorias' => $categorias,
            'blogs' => $blogs,
            'con' => $config
        ]);
    }

    public function category(categoria $categoria, $id) {
        $categorias = categoria::all();
        $categoria = categoria::find($id);
        $secciones = seccion::all();
        $blogs = \App\blog::all();
        $config = config::find('1');

        return view('categoria.lista', [
            'secciones' => $secciones,
            'categorias' => $categorias,
            'listado' => $categoria,
            'blogs' => $blogs,
            'con' => $config
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if(\Auth::user() && (\Auth::user()->role == 'editor' || \Auth::user()->role == 'socio' || \Auth::user()->role == 'admin' || \Auth::user()->role == 'Superadmin')){

            $categoria = categoria::find($id);

            return view('categoria.editar', [
                'categoria' => $categoria
            ]);
        }else{
            return redirect()->route('index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        if(\Auth::user() && (\Auth::user()->role == 'editor' || \Auth::user()->role == 'socio' || \Auth::user()->role == 'admin' || \Auth::user()->role == 'Superadmin')){

            $validate = $this->validate($request, [
                'imagen' => 'image'
            ]);
            //recoger los datos
            $id = $request->input('id');
            $titulo = $request->input('titulo');
            $imagen = $request->file('imagen');
            $descripcionC = $request->input('descripcionC');
            $descripcionL = $request->input('descripcionL');
            $metadesc = $request->input('metadesc');
            $metatitle = $request->input('metatitle');
            $metakey = $request->input('metakey');
            //cargo objeto de la BD
            $categoria = categoria::find($id);
            //recibir imagen
            if ($imagen) {
                //poner nombre unico
                $imagen_name = time() . $imagen->getClientOriginalName();
                //guardamos en la carpeta users de storage/app/users
                Storage::disk('categorias')->put($imagen_name, File::get($imagen));
                //seteo el objeto
                $categoria->imagen = $imagen_name;
            }


            //seteo objeto
            $user = \Auth::user();
            $categoria->user_id = $user->id;
            $categoria->titulo = $titulo;
            $categoria->descripcionC = $descripcionC;
            $categoria->descripcionL = $descripcionL;
            $categoria->metadesc = $metadesc;
            $categoria->metatitle = $metatitle;
            $categoria->metakey = $metakey;
            //guardar
            $save = $categoria->update();
            //redirigir
            if ($save) {
                return redirect()->route('categoria.gestion')->with([
                            'message' => 'categoria guardada exitosamente'
                ]);
            } else {
                return redirect()->route('categoria.gestion')->with([
                            'message' => 'fallo al guardar categoria'
                ]);
            }
        }else{
            return redirect()->route('index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        if(\Auth::user() && (\Auth::user()->role == 'editor' || \Auth::user()->role == 'socio' || \Auth::user()->role == 'admin' || \Auth::user()->role == 'Superadmin')){

            $categoria = categoria::find($id);
            //eliminar Storage
            Storage::disk('categorias')->delete($categoria->imagen);
            //eliminar registro
            $save = $categoria->delete();
            if ($save) {
                $message = array('message' => 'categoria eliminada exitosamente');
                return redirect()->route('categoria.gestion')->with($message);
            } else {
                $message = array('message' => 'fallo al borrar la categoria');
                return redirect()->route('categoria.gestion')->with($message);
            }
        }else{
            return redirect()->route('index');
        }
    }

}
