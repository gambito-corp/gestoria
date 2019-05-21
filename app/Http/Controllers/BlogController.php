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
use App\config;

class BlogController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gestion() {

        $blog = blog::all();


        return view('blog.gestion', [
            'blogs' => $blog
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $categorias = categoria::all();
        $tag = \App\tag::all();
        return view('blog.crear', [
            'categorias' => $categorias,
            'tags' => $tag
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
            'categoria' => 'required',
            'titulo' => 'required',
            'imagen' => 'required|image',
            'subtitulo' => 'required',
            'contenido' => 'required',
            'tag' => 'required',
            'metadesc' => 'required',
            'metatitle' => 'required',
            'metakey' => 'required'
        ]);
        //recojo los datos


        $categoria = $request->input('categoria');
        $titulo = $request->input('titulo');
        $imagen = $request->file('imagen');
        $subtitulo = $request->input('subtitulo');
        $contenido = $request->input('contenido');
        $tag = $request->input('tag');
        $metadesc = $request->input('metadesc');
        $metatitle = $request->input('metatitle');
        $metakey = $request->input('metakey');

        //seteo objeto
        //cargo usuario autenticado
        $user = \Auth::user();
        $blog = new blog();
        $blog->user_id = $user->id;
        $blog->categoria_id = $categoria;
        $blog->titulo = $titulo;
        if ($imagen) {
            //nombre unico
            $imagen_n = time() . $imagen->getClientOriginalName();
            //guardamos en la carpeta
            Storage::disk('blog')->put($imagen_n, File::get($imagen));
            //seteo el objeto
            $blog->imagen = $imagen_n;
        }
        $blog->subtitulo = $subtitulo;
        $blog->contenido = $contenido;
        $blog->tag_id = $tag;
        $blog->metadesc = $metadesc;
        $blog->metatitle = $metatitle;
        $blog->metakey = $metakey;
        //metodo save
        $save = $blog->save();
        //comprobamos redireccion
        if ($save) {
            return redirect()->route('blog.gestion')->with([
                        'message' => 'Articulo Creado Exitosamente'
            ]);
        } else {
            return redirect()->route('blog.gestion')->with([
                        'message' => 'Fallo Al Crear El Post'
            ]);
        }
    }

    public function getImagen($filename) {
        $file = Storage::disk('blog')->get($filename);
        return new Response($file, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(blog $blog, $id) {
        $blogs = blog::all();
        $secciones = seccion::all();
        $categorias = categoria::all();
        $miBlog = blog::find($id);
        $config = config::find('1');
        $comentarios = comentario::orderBy('id', 'desc')->get();
        return view('blog.blog', [
            'blogs' => $blogs,
            'secciones' => $secciones,
            'categorias' => $categorias,
            'miBlog' => $miBlog,
            'comentarios' => $comentarios,
            'con' => $config
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(blog $blog, $id) {
        $blog = blog::find($id);
        $categoria = categoria::all();
        $tag = \App\tag::all();
        return view('blog.editar', [
            'blog' => $blog,
            'categorias' => $categoria,
            'tags' => $tag
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, blog $blog) {
        //validar formulario
        $validate = $this->validate($request, [
            'imagen' => 'image'
        ]);
        //guardar datos
        $id = $request->input('id');
        $categoria = $request->input('categoria');

        $titulo = $request->input('titulo');
        $imagen = $request->file('imagen');
        $subtitulo = $request->input('subtitulo');
        $contenido = $request->input('contenido');
        $tag = $request->input('tag');

        $metadesc = $request->input('metadesc');
        $metatitle = $request->input('metatitle');
        $metakey = $request->input('metakey');
        //cargo objeto de la BD
        $user = \Auth::user();
        $blog = blog::find($id);
        //setear objetos
        $blog->user_id = $user->id;
        $blog->categoria_id = $categoria;
        $blog->titulo = $titulo;
        //recibir imagen
        if ($imagen) {
            //poner nombre unico
            $imagen_name = time() . $imagen->getClientOriginalName();
            //guardamos en la carpeta blogs de storage/app/blogs
            Storage::disk('blogs')->put($imagen_name, File::get($imagen));
            //seteo imagen en el objeto
            $blog->imagen = $imagen_name;
        }
        $blog->subtitulo = $subtitulo;
        $blog->contenido = $contenido;
        $blog->tag_id = $tag;
        $blog->metadesc = $metadesc;
        $blog->metatitle = $metatitle;
        $blog->metakey = $metakey;
        //guardar
        $save = $blog->update();
        //redirigir
        if ($save) {
            return redirect()->route('blog.gestion')->with([
                        'message' => 'blog guardado exitosamente'
            ]);
        } else {
            return redirect()->route('blog.gestion')->with([
                        'message' => 'fallo al guardar blog'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $blog = blog::find($id);
        //eliminar registro
        $save = $blog->delete();
        if ($save) {
            return redirect()->route('blog.gestion')->with([
                        'message' => 'blog eliminado exitosamente'
            ]);
        } else {
            return redirect()->route('blog.gestion')->with([
                        'message' => 'fallo al eliminar blog'
            ]);
        }
    }

}
