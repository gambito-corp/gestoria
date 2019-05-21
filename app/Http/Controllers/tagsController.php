<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
Use Faker\Provider\Image;
use App\tag;

class tagsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $tags = tag::all();

        return view('tag.gestion', [
            'tags' => $tags
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('tag.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //validacion
        $validate = $this->validate($request, [
            'titulo' => 'required',
        ]);

        //recojo los datos
        $titulo = $request->input('titulo');

        //setear objeto
        $tag = new tag();

        $tag->titulo = $titulo;

        // subir datos
        $save = $tag->save();
        if ($save) {
            return redirect()->route('etiquetas.gestion')->with([
                        'message' => 'Etiqueta creada exitosamente'
            ]);
        } else {
            return redirect()->route('etiquetas.gestion')->with([
                        'message' => 'fallo al crear la etiqueta'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $tag = tag::find($id);
        return view('tag.detalle', [
            'tag' => $tag
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $tag = tag::find($id);
        return view('tag.editar', [
            'tag' => $tag
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //validacion
        $validate = $this->validate($request, [
            'titulo' => 'required',
        ]);

        //recojo los datos
        $titulo = $request->input('titulo');
        // busco objeto en la BD
        $tag = tag::find($id);

        //setear objeto
        $tag->titulo = $titulo;
        //guardo Objeto
        $save = $tag->update();
        //compruebo y devuelvo vista
        if ($save) {
            return redirect()->route('etiquetas.gestion')->with([
                        'message' => 'Etiqueta actualizada exitosamente'
            ]);
        } else {
            return redirect()->route('etiquetas.gestion')->with([
                        'message' => 'fallo al actualizar la etiqueta'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //busco objeto
        $tag = tag::find($id);
        //ejecuto eliminar
        $save = $tag->delete();
        //redirigo confirmacion
        if ($save) {
            return redirect()->route('etiquetas.gestion')->with([
                        'message' => 'Etiqueta Eliminada exitosamente'
            ]);
        } else {
            return redirect()->route('etiquetas.gestion')->with([
                        'message' => 'fallo al eliminar la etiqueta'
            ]);
        }
    }

}
