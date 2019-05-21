<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
Use Faker\Provider\Image;
use App\seccion;
use App\User;
use App\config;

class seccionesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gestion() {
        if(\Auth::user() && (\Auth::user()->role == 'Superadmin'||\Auth::user()->role == 'admin'||\Auth::user()->role == 'socio')){
            $secciones = seccion::all();
            return view('secciones.gestion', [
                'secciones' => $secciones
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
        $config = config::find('1');

        return view('secciones.index', [
            'secciones' => $secciones,
            'categorias' => $categorias,
            'blogs' => $blogs,
            'con' => $config
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        if(\Auth::user() && (\Auth::user()->role == 'Superadmin'||\Auth::user()->role == 'admin'||\Auth::user()->role == 'socio')){            
            return view('secciones.crear');
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
        if(\Auth::user() && (\Auth::user()->role == 'Superadmin'||\Auth::user()->role == 'admin'||\Auth::user()->role == 'socio')){            
            //validacion
            $validate = $this->validate($request, [
                'titulo' => 'required',
                'imagenCentral' => 'required|image',
                'descripcionC' => 'required',
                'descripcionL' => 'required',
                'icono' => 'required',
                'metadesc' => 'required',
                'metatitle' => 'required',
                'metakey' => 'required'
            ]);

            //recojo los datos
            $titulo = $request->input('titulo');
            $imagenCentral = $request->file('imagenCentral');
            $descripcionC = $request->input('descripcionC');
            $descripcionL = $request->input('descripcionL');
            $icono = $request->input('icono');
            $metadesc = $request->input('metadesc');
            $metatitle = $request->input('metatitle');
            $metakey = $request->input('metakey');
            //setear objeto
            $user = \Auth::user();
            $seccion = new seccion();
            $seccion->user_id = $user->id;
            $seccion->titulo = $titulo;
            if ($imagenCentral) {
                //poner nombre unico
                $imagenC_name = time() . $imagenCentral->getClientOriginalName();
                //guardamos en la carpeta users de storage/app/users
                Storage::disk('secciones')->put($imagenC_name, File::get($imagenCentral));
                //seteo el objeto
                $seccion->imagenCentral = $imagenC_name;
            }
            $seccion->descripcionC = $descripcionC;
            $seccion->descripcionL = $descripcionL;
            $seccion->icono = $icono;
            $seccion->metadesc = $metadesc;
            $seccion->metatitle = $metatitle;
            $seccion->metakey = $metakey;
            // subir datos
            $seccion->save();
            return redirect()->route('secciones.gestion')->with([
                        'message' => 'todo ok'
            ]);
        }else{
            return redirect()->route('index');
        }
        
    }

    public function getImagen($filename) {
        $file = Storage::disk('secciones')->get($filename);
        return new Response($file, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $seccion = seccion::find($id);
        $categorias = \App\categoria::all();
        $secciones = seccion::orderBy('id', 'desc')->get();
        $blogs = \App\blog::all();
        $config = config::find('1');
        return view('secciones.revisar', [
            'secciones' => $secciones,
            'seccion' => $seccion,
            'categorias' => $categorias,
            'blogs' => $blogs,
            'con' => $config
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        if(\Auth::user() && (\Auth::user()->role == 'Superadmin'||\Auth::user()->role == 'admin'||\Auth::user()->role == 'socio')){            
            $seccion = seccion::find($id);

            return view('secciones.editar', [
                'seccion' => $seccion
            ]);
        }else{
            return redirect()->route('index');
        }
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {

        if(\Auth::user() && (\Auth::user()->role == 'Superadmin'||\Auth::user()->role == 'admin'||\Auth::user()->role == 'socio')){            
            //valido datos
            $validate = $this->validate($request, [
                'imagenCentral' => 'image'
            ]);
            //recojo datos
            $id = $request->input('id');
            $titulo = $request->input('titulo');
            $imagenCentral = $request->file('imagenCentral');
            $descripcionC = $request->input('descripcionC');
            $descripcionL = $request->input('descripcionL');
            $icono = $request->input('icono');
            $metadesc = $request->input('metadesc');
            $metatitle = $request->input('metatitle');
            $metakey = $request->input('metakey');
            //buscar mi objeto en la base de datos
            $seccion = seccion::find($id);


            //seteo objeto
            $user = \Auth::user();

            $seccion->user_id = $user->id;
            $seccion->titulo = $titulo;

            if ($imagenCentral) {
                //poner nombre unico
                $imagenC_name = time() . $imagenCentral->getClientOriginalName();
                //guardamos en la carpeta users de storage/app/users
                Storage::disk('secciones')->put($imagenC_name, File::get($imagenCentral));
                //seteo el objeto
                $seccion->imagenCentral = $imagenC_name;
            }
            $seccion->descripcionC = $descripcionC;
            $seccion->descripcionL = $descripcionL;
            $seccion->icono = $icono;
            $seccion->metadesc = $metadesc;
            $seccion->metatitle = $metatitle;
            $seccion->metakey = $metakey;
            //guardo objeto

            $save = $seccion->update();
            //devuelvo vista

            if ($save) {
                return redirect()->route('secciones.gestion')
                                ->with(['message' => 'Seccion Actualizada con exito']);
            } else {
                return redirect()->route('secciones.gestion')
                                ->with(['message' => 'no actualizo']);
            }
        }else{
            return redirect()->route('index');
        }
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        if(\Auth::user() && (\Auth::user()->role == 'Superadmin'||\Auth::user()->role == 'admin'||\Auth::user()->role == 'socio')){            
            $seccion = seccion::find($id);
            //eliminar Storage
            Storage::disk('secciones')->delete($seccion->imagenCentral);
            //eliminar registro
            $seccion->delete();
            $message = array('message' => 'Seccion eliminada');
            return redirect()->route('secciones.gestion')->with($message);
        }else{
            return redirect()->route('index');
        }
        

    }

}
