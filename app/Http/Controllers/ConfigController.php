<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\config;
use App\User;

class ConfigController extends Controller {

    public function index() {
        if(\Auth::user() && (\Auth::user()->role == 'Superadmin' || \Auth::user()->role == 'admin')){
            $config = config::all();
            return view('config.gestion', [
                'config' => $config
            ]);
        }else{
            return redirect()->route('index');
        }
        
    }

    public function create() {
        if(\Auth::user() && (\Auth::user()->role == 'Superadmin' || \Auth::user()->role == 'admin')){
            return view('config.crear');
        }else{
            return redirect()->route('index');
        }        
    }

    public function store(Request $request) {
        if(\Auth::user() && (\Auth::user()->role == 'Superadmin' || \Auth::user()->role == 'admin')){
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
        }else{
            return redirect()->route('index');
        }  
        //validar

        
    }

    public function edit($id) {
        if(\Auth::user() && (\Auth::user()->role == 'Superadmin' || \Auth::user()->role == 'admin')){
            $config = config::find('1');
            return view('config.edit', [
                'con' => $config
            ]);
        }else{
            return redirect()->route('index');
        } 
        
    }

    public function update(Request $request) {

        if(\Auth::user() && (\Auth::user()->role == 'Superadmin' || \Auth::user()->role == 'admin')){
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
        }else{
            return redirect()->route('index');
        } 
        
    }

    public function destroy($id) {
        if(\Auth::user() && (\Auth::user()->role == 'Superadmin' || \Auth::user()->role == 'admin')){
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
        }else{
            return redirect()->route('index');
        }         
    }
}
