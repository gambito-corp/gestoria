<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class seccion extends Model {

    protected $table = 'secciones';
    protected $fillable = [
        'user_id', 'titulo', 'imagenCentral', 'descripcionC', 'descripcionL', 'icono', 'metadesc', 'metatitle', 'metakey'
    ];

    //Relacion Many to One / de muchos a uno
    //relacion One to Many / de uno a mucho
    //Relacion one to one / de uno a uno
    //Relacion Many to Many / muchos a muchos
    Public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

//    Public function secciones() {
//        return $this->hasOne('App\User');
//    }
//    Public function secciones() {
//        return $this->belongsTo('App\User');
//    }
//    Public function secciones() {
//        return $this->belongsToMany('App\User');
//    }
//    Public function secciones() {
//        return $this->hasManyThrough('App\User');
//    }
}
