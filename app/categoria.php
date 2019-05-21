<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoria extends Model {

    protected $table = 'categorias';
    protected $fillable = [
        'user_id', 'titulo', 'descripcionC', 'descripcionL', 'imagen', 'metadesc', 'metatitle', 'metakey'
    ];

    Public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

}
