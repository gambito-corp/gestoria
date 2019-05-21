<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comentario extends Model {

    protected $table = 'comentarios';

    //relacion de muchos a uno / many to one
    public function user() {
        return $this->belongsTo('\App\User', 'user_id');
    }

    //relacion de muchos a uno / many to one
    public function blog() {
        return $this->belongsTo('\App\blog', 'blog_id');
    }

}
