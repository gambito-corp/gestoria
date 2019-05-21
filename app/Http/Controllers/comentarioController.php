<?php

namespace App\Http\Controllers;

use App\blog;
use App\categoria;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
Use Faker\Provider\Image;
use App\seccion;
use App\User;
use App\comentario;

class comentarioController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $comentarios = comentario::all();

        return view('comentarios.gestion', [
            'blogs' => $comentarios
        ]);
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
            'blog_id' => 'integer|required',
            'comentario' => 'required'
        ]);
        //recoger datos

        $user = \Auth::user();
        $blog_id = $request->input('blog_id');
        $coment = $request->input('comentario');
        //asigno los valores a guardar
        $comentario = new comentario();
        $comentario->user_id = $user->id;
        $comentario->blog_id = $blog_id;
        $comentario->contenido = $coment;
        //guardar
        $save = $comentario->save();
        //redirigir
        if ($save) {
            return redirect()->route('blog.ver', ['id' => $blog_id])->with([
                        'message' => $user->name . ' has Publicado un comentario'
            ]);
        } else {
            return redirect()->route('blog.ver', ['id' => $blog_id])->with([
                        'message' => $user->name . ' Hubo un fallo en los comentarios, intentalo de nuevo'
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
        //conseguir datos del usuario identificado
        $user = \Auth::user();
        //conseguir ob jeto comentario
        $comentario = comentario::find($id);
        //comprobar si soy el dueño del comentario o un moderador
        if ($user && ($comentario->user_id == $user->id || $comentario->blog->user_id == $user->id || $user->role == 'admin' || $user->role == 'Superadmin')) {
            $save = $comentario->delete();
            if ($save) {
                return redirect()->route('blog.ver', ['id' => $comentario->blog->id])->with([
                            'message' => 'Comentario eliminado exitosamente'
                ]);
            } else {
                return redirect()->route('blog.ver', ['id' => $comentario->blog->id])->with([
                            'message' => 'fallo al eliminar el comentario'
                ]);
            }
        }
    }

    public function eliminar($id) {
        //busco objeto
        $comentario = comentario::find($id);
        //elimino objeto
        $save = $comentario->delete();
        if ($save) {
            return redirect()->route('comentario.gestion', ['id' => $comentario->blog->id])->with([
                        'message' => 'Comentario eliminado exitosamente'
            ]);
        } else {
            return redirect()->route('comentario.gestion', ['id' => $comentario->blog->id])->with([
                        'message' => 'fallo al eliminar el comentario'
            ]);
        }
    }

}
