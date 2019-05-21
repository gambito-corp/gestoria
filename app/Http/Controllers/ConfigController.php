<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\config;

class ConfigController extends Controller {

    public function index() {
        $config = config::all();
        return view('config.gestion', [
            'config' => $config
        ]);
    }

    public function create() {
        return view('config.crear');
    }

    public function store(Request $request) {
        //validar

        $validate = $this->validate($request, [
            'semana' => 'required',
            'sabado' => 'required',
            'domingo' => 'required',
            'facebook' => 'required|url',
            'twitter' => 'required|url',
            'linkedin' => 'required|url',
            'correo1' => 'required|email',
            'correo2' => 'required|email',
            'telefono1' => 'required',
            'telefono2' => 'required',
            'direccion' => 'required',
            'marca' => 'required',
            'name' => 'required',
            'name2' => 'required',
            'surname' => 'required',
            'surname2' => 'required',
            'firma' => 'required'
        ]);

        //recoger variables
        $semana = $request->input('semana');
        $sabado = $request->input('sabado');
        $domingo = $request->input('domingo');
        $facebook = $request->input('facebook');
        $twitter = $request->input('twitter');
        $linkedin = $request->input('linkedin');
        $correo1 = $request->input('correo1');
        $correo2 = $request->input('correo2');
        $telefono1 = $request->input('telefono1');
        $telefono2 = $request->input('telefono2');
        $direccion = $request->input('direccion');
        $marca = $request->input('marca');
        $name = $request->input('name');
        $name2 = $request->input('name2');
        $surname = $request->input('surname');
        $surname2 = $request->input('surname2');
        $firma = $request->input('firma');

        //crear objeto
        $config = new config();
        //setear objeto
        $config->semana = $semana;
        $config->sabado = $sabado;
        $config->domingo = $domingo;
        $config->facebook = $facebook;
        $config->twitter = $twitter;
        $config->linkedin = $linkedin;
        $config->correo1 = $correo1;
        $config->correo2 = $correo2;
        $config->telefono1 = $telefono1;
        $config->telefono2 = $telefono2;
        $config->direccion = $direccion;
        $config->marca = $marca;
        $config->nombre1 = $name;
        $config->nombre2 = $name2;
        $config->apellido1 = $surname;
        $config->apellido2 = $surname2;
        $config->firma = $firma;


        //guardar
        $save = $config->save();
        //redirigir
        if ($save) {
            return redirect()->route('config.gestion')->with([
                        'message' => 'parametros configurados Correctamente'
            ]);
        } else {
            return redirect()->route('config.gestion')->with([
                        'message' => 'fallo al guardar parametros'
            ]);
        }
    }

    public function edit($id) {
        $config = config::find('1');
        return view('config.edit', [
            'con' => $config
        ]);
    }

    public function update(Request $request) {
        //validar

        $validate = $this->validate($request, [
            'facebook' => 'url',
            'twitter' => 'url',
            'linkedin' => 'url',
            'correo1' => 'email',
            'correo2' => 'email'
        ]);

        //recoger variables
        $id = $request->input('id');
        var_dump($id);
        $semana = $request->input('semana');
        var_dump($semana);
        $sabado = $request->input('sabado');
        var_dump($sabado);
        $domingo = $request->input('domingo');
        var_dump($domingo);
        $facebook = $request->input('facebook');
        var_dump($facebook);
        $twitter = $request->input('twitter');
        var_dump($twitter);
        $linkedin = $request->input('linkedin');
        var_dump($linkedin);
        $correo1 = $request->input('correo1');
        var_dump($correo1);
        $correo2 = $request->input('correo2');
        var_dump($correo2);
        $telefono1 = $request->input('telefono1');
        var_dump($telefono1);
        $telefono2 = $request->input('telefono2');
        var_dump($telefono2);
        $direccion = $request->input('direccion');
        var_dump($direccion);
        $marca = $request->input('marca');
        var_dump($marca);
        $name = $request->input('name');
        var_dump($name);
        $name2 = $request->input('name2');
        var_dump($name2);
        $surname = $request->input('surname');
        var_dump($surname);
        $surname2 = $request->input('surname2');
        var_dump($surname2);
        $firma = $request->input('firma');
        var_dump($firma);

        //crear objeto
        $config = config::find($id);
        var_dump($config);
        //setear objeto
        $config->semana = $semana;
        $config->sabado = $sabado;
        $config->domingo = $domingo;
        $config->facebook = $facebook;
        $config->twitter = $twitter;
        $config->linkedin = $linkedin;
        $config->correo1 = $correo1;
        $config->correo2 = $correo2;
        $config->telefono1 = $telefono1;
        $config->telefono2 = $telefono2;
        $config->direccion = $direccion;
        $config->marca = $marca;
        $config->nombre1 = $name;
        $config->nombre2 = $name2;
        $config->apellido1 = $surname;
        $config->apellido2 = $surname2;
        $config->firma = $firma;


        //guardar
        $save = $config->update();
        //redirigir
        if ($save) {
            return redirect()->route('config.gestion')->with([
                        'message' => 'parametros configurados Correctamente'
            ]);
        } else {
            return redirect()->route('config.gestion')->with([
                        'message' => 'fallo al guardar parametros'
            ]);
        }
    }

    public function destroy($id) {
        $config = config::find($id);
        //eliminar registro
        $save = $config->delete();
        if ($save) {
            return redirect()->route('config.gestion')->with([
                        'message' => 'Parametros borrados Exitosamente'
            ]);
        } else {
            return redirect()->route('config.gestion')->with([
                        'message' => 'fallo al eliminar Parametros'
            ]);
        }
    }

}
