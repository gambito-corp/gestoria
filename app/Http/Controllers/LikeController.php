<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\like;

class LikeController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function like($blog_id) {
        //recoger datos del usuario y blog
        $user = \Auth::user();

        //comprobar si ya existe el like
        $isset_like = like::where('user_id', $user->id)
                ->where('blog_id', $blog_id)
                ->count();
        if ($isset_like == 0) {


            //creo objeto
            $like = new like();
            // seteo objeto
            $like->user_id = $user->id;
            $like->blog_id = (int) $blog_id;
            // guardo objeto
            $save = $like->save();
            return response()->json([
                        'like' => $like
            ]);
        } else {
            return response()->json([
                        'message' => 'El Like Ya Existe'
            ]);
        }
    }

    public function dislike($blog_id) {
        //recoger datos del usuario y blog
        $user = \Auth::user();

        //comprobar si ya existe el like
        $like = like::where('user_id', $user->id)
                ->where('blog_id', $blog_id)
                ->first();
        if ($like) {
            // eliminar objeto
            $save = $like->delete();
            return response()->json([
                        'like' => $like,
                        'message' => 'Has dado Dislike Correctamente'
            ]);
        } else {
            return response()->json([
                        'message' => 'El Like No Existe'
            ]);
        }
    }

}
