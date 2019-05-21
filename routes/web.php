<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

use App\User;
use App\blog;
use App\categoria;
use App\seccion;
use App\tag;
use App\config;

Route::get('/', function () {
    $secciones = seccion::orderBy('id', 'desc')->paginate(6);
    $categorias = categoria::all();
    $blog = \App\blog::all();
    $config = config::find('1');
    return view('inicio.index', [
        'secciones' => $secciones,
        'categorias' => $categorias,
        'blogs' => $blog,
        'con' => $config
    ]);
})->name('index');
route::get('/somos', 'HomeController@somos')->name('inicio.somos');


Auth::routes();

Route::get('/Login', 'HomeController@index')->name('home');
route::get('/configuracion', 'userController@config')->name('config');
route::post('/user/update', 'userController@update')->name('user.update');
route::get('/user/imagen/{filename}', 'userController@getImagen')->name('user.imagen');
route::get('/user/gestion', 'userController@gestion')->name('user.gestion');
route::get('/user/eliminar/{id}', 'userController@destroy')->name('user.eliminar');
route::get('/user/editar/{id}', 'userController@edit')->name('user.editar');
route::post('/user/actualizarM', 'userController@edit_master')->name('user.actualizar.maestro');


//rutas de secciones
route::get('/secciones/todas', 'seccionesController@index')->name('secciones.index');
route::get('/seccion/{id}', 'seccionesController@show')->name('secciones.revisar');
route::get('/secciones/gestion', 'seccionesController@gestion')->name('secciones.gestion');
route::get('/secciones/crear', 'seccionesController@create')->name('secciones.crear');
route::post('/secciones/guardar', 'seccionesController@store')->name('secciones.guardar');
route::get('/secciones/imagen/{filename}', 'seccionesController@getImagen')->name('secciones.imagen');
route::get('/secciones/eliminar/{id}', 'seccionesController@destroy')->name('secciones.eliminar');
route::get('/secciones/editar/{id}', 'seccionesController@edit')->name('secciones.editar');
route::post('/secciones/actualizar', 'seccionesController@update')->name('secciones.actualizar');

//rutas de etiquetas
route::get('tag', 'tagsController@index')->name('etiquetas.gestion');
route::get('tag/crear', 'tagsController@create')->name('etiquetas.crear');
route::post('tag/guardar', 'tagsController@store')->name('etiquetas.guardar');
route::get('tag/mostrar/{id}', 'tagsController@show')->name('etiquetas.detalle');
route::get('tag/editar/{id}', 'tagsController@edit')->name('etiquetas.editar');
route::post('tag/actualizar/{id}', 'tagsController@update')->name('etiquetas.actualizar');
route::get('tag/eliminar/{id}', 'tagsController@destroy')->name('etiquetas.eliminar');


//rutas de categorias
route::get('/categoria/gestion', 'CategoriaController@gestion')->name('categoria.gestion');
route::get('/categoria/crear', 'CategoriaController@create')->name('categoria.crear');
route::post('/categoria/guardar', 'CategoriaController@store')->name('categoria.guardar');
route::get('/categoria/imagen/{filename}', 'CategoriaController@getImagen')->name('categoria.imagen');
route::get('/categoria/eliminar/{id}', 'CategoriaController@destroy')->name('categoria.eliminar');
route::get('/categoria/editar/{id}', 'CategoriaController@edit')->name('categoria.editar');
route::post('/categoria/actualizar', 'CategoriaController@update')->name('categoria.actualizar');
route::get('/categoria/listado', 'CategoriaController@show')->name('categoria.lista');
route::get('/categoria/{id}', 'CategoriaController@category')->name('categoria.individual');

//rutas de blogs
route::get('/blog/gestion', 'BlogController@gestion')->name('blog.gestion');
route::get('/blog/crear', 'BlogController@create')->name('blog.crear');
route::post('/blog/guardar', 'BlogController@store')->name('blog.guardar');
route::get('/blog/imagen/{filename}', 'BlogController@getImagen')->name('blog.imagen');
route::get('/blog/eliminar/{id}', 'BlogController@destroy')->name('blog.eliminar');
route::get('/blog/editar/{id}', 'BlogController@edit')->name('blog.editar');
route::post('/blog/actualizar', 'BlogController@update')->name('blog.actualizar');
route::get('/blog/{id}', 'BlogController@show')->name('blog.ver');

//rutas de comentarios
route::post('/comentario/guardar', 'comentarioController@store')->name('comentario.guardar');
route::get('/comentario/eliminar/{id}', 'comentarioController@destroy')->name('comentario.eliminar');
route::get('/comentario/eliminar_master/{id}', 'comentarioController@eliminar')->name('comentario.eliminar_maestro');
route::get('/comentarios/gestion', 'comentarioController@index')->name('comentario.gestion');

// rutas de likes
route::get('/like/{blog_id}', 'likeController@like')->name('like.guardar');
route::get('/dislike/{blog_id}', 'likeController@dislike')->name('like.delete');

//rutas de contactos
route::get('/contacto/gestion', 'ContactoController@index')->name('contacto.gestion');
route::get('/contacto/crear', 'ContactoController@create')->name('contacto.crear');
route::post('/contacto/guardar', 'ContactoController@store')->name('contacto.guardar');
route::get('/contacto/editar/{id}', 'ContactoController@edit')->name('contacto.editar');
route::post('/contacto/actualizar', 'ContactoController@update')->name('contacto.actualizar');
route::get('/contacto/eliminar/{id}', 'ContactoController@destroy')->name('contacto.eliminar');

//rutas de configuracion
route::get('/config/gestion', 'configController@index')->name('config.gestion');
route::get('/config/crear', 'configController@create')->name('config.crear');
route::post('/config/guardar', 'configController@store')->name('config.guardar');
route::get('/config/editar/{id}', 'configController@edit')->name('config.editar');
route::post('/config/actualizar', 'configController@update')->name('config.actualizar');
route::get('/config/eliminar/{id}', 'configController@destroy')->name('config.eliminar');

//rutas de pruebas
route::get('/prueba', 'homeController@index');

