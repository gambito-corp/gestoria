<?php

namespace App\Http\Controllers;

Use Illuminate\Http\Response;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\File;
Use Faker\Provider\Image;
Use Illuminate\Support\Facades\Storage;
Use App\User;

class userController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function config() {
        return view('user.config');
    }

    public function update(Request $request) {

        //Consegir el usuario identificado
        $user = \Auth::user();
        $id = \Auth::user()->id;
        //validacion del servidor
        $validate = $this->validate($request, [
            'name' => 'required', 'string', 'max:255',
            'name2' => 'required', 'string', 'max:255',
            'surname' => 'required', 'string', 'max:255',
            'surname2' => 'required', 'string', 'max:255',
            'nick' => 'required', 'string', 'max:255', 'unique:users, nick,' . $id,
            'telefono' => 'required', 'integer',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users, email,' . $id,
        ]);

//recoger los datos del usuario
        $name = $request->input('name');
        $name2 = $request->input('name2');
        $surname = $request->input('surname');
        $surname2 = $request->input('surname2');
        $nick = $request->input('nick');
        $telefono = $request->input('telefono');
        $email = $request->input('email');
        //asignar valores al objeto del usuario
        $user->name = $name;
        $user->name2 = $name2;
        $user->surname = $surname;
        $user->surname2 = $surname2;
        $user->nick = $nick;
        $user->telefono = $telefono;
        $user->email = $email;

        //Subir la imagen
        $imagen = $request->file('imagen');
        if ($imagen) {
            //poner nombre unico
            $imagen_name = time() . $imagen->getClientOriginalName();
            //guardamos en la carpeta users de storage/app/users
            Storage::disk('users')->put($imagen_name, File::get($imagen));
            //seteo el objeto
            $user->imagen = $imagen_name;
        }
        //ejecutar consulta y cambios en la BD
        $user->update();
        return redirect()->route('config')
                        ->with(['message' => 'Usuario Actualizado Correctamente']);
    }

    public function getImagen($filename) {
        $file = Storage::disk('users')->get($filename);
        return new Response($file, 200);
    }

    //create, edit, config listo falta gestion delete edit_master update y perfil
    public function gestion() {
        if(\Auth::user() && (\Auth::user()->role == 'Superadmin'||\Auth::user()->role == 'admin')){
            $users = \App\User::all();
            return view('user.gestion', [
                'users' => $users
            ]);
        }else{
            return redirect()->route('index');
        }
        
    }

    public function edit($id) {
        if(\Auth::user() && (\Auth::user()->role == 'Superadmin'||\Auth::user()->role == 'admin'||\Auth::user()->role == 'socio'||\Auth::user()->role == 'editor')){
            $user = user::find($id);
            //paso a la vista el array u la variable editar
            return view('user.edit', [
                'user' => $user
            ]); 
        }else{
            return redirect()->route('index');
        }
        //cargo usuario especifico de la BD
        
    }

    public function edit_master(Request $request) {
        if(\Auth::user() && (\Auth::user()->role == 'Superadmin'||\Auth::user()->role == 'admin'||\Auth::user()->role == 'socio'||\Auth::user()->role == 'editor')){
            $id = $request->input('id');
            //validacion
            $validate = $this->validate($request, [
                'imagen' => 'image'
            ]);
            //recoger los datos del usuario
            $role = $request->input('role');
            $name = $request->input('name');
            $name2 = $request->input('name2');
            $surname = $request->input('surname');
            $surname2 = $request->input('surname2');
            $nick = $request->input('nick');
            $telefono = $request->input('telefono');
            $email = $request->input('email');

            //recojer objeto usuario para setearlo correctamente con los datos actualizados
            $usuario = user::find($id);

            //recoger imagen
            $imagen = $request->file('imagen');
            if ($imagen) {
                //poner nombre unico
                $imagen_name = time() . $imagen->getClientOriginalName();
                //guardamos en la carpeta users de storage/app/users
                Storage::disk('users')->put($imagen_name, File::get($imagen));
                //seteo el objeto
                $usuario->imagen = $imagen_name;
            }
            //seteo objeto
            $usuario->role = $role;
            $usuario->name = $name;
            $usuario->name2 = $name2;
            $usuario->surname = $surname;
            $usuario->surname2 = $surname2;
            $usuario->nick = $nick;
            $usuario->telefono = $telefono;
            $usuario->email = $email;


            //actualizar objeto usuario
            $save = $usuario->update();
            // redireccion a gestion
            if ($save) {

                return redirect()->route('user.gestion')->with(['message' => 'usuario actualizado con exito']);
            } else {
                return redirect()->route('user.gestion')->with(['message' => 'usuario no actualizado']);
            }
        }else{
            return redirect()->route('index');
        }
        
    }

    public function destroy($id) {

        if(\Auth::user() && (\Auth::user()->role == 'Superadmin'||\Auth::user()->role == 'admin'||\Auth::user()->role == 'socio'||\Auth::user()->role == 'editor')){
            $users = user::find($id);
            //eliminar Storage
            Storage::disk('users')->delete($users->imagen);
            //eliminar registro
            $delete = $users->delete();

            if ($delete) {

                return redirect()->route('user.gestion')->with(['message' => 'usuario eliminado con exito']);
            } else {
                return redirect()->route('user.gestion')->with(['message' => 'usuario no eliminado']);
            }
        }else{
            return redirect()->route('index');
        }
        
    }

    public function perfil($id) {
        $user = User::find($id);

        return view('user.perfil');
    }

}
