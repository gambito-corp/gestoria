<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blog extends Model {

    protected $table = 'blogs';
    protected $fillable = [
        'user_id', 'categoria_id', 'titulo', 'imagen', 'subtitulo', 'contenido', 'tag_id', 'metadesc', 'metatitle', 'metakey'
    ];

    // Relacion one to many / de uno a muchos
    Public function comentarios() {
        return $this->belongsTo('App\comentario', 'blog_id');
    }

    // Relacion one to many / de uno a muchos
    Public function likes() {
        return $this->hasMany('App\like');
    }

    // Relacion one to many / de uno a muchos
    public function tags() {
        return $this->belongsTo('App\tag', 'tag_id');
    }

    //Relacion Many to one / muchos a uno
    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    //Relacion Many to one / muchos a uno
    public function categorias() {
        return $this->belongsTo('App\categoria', 'categoria_id');
    }

    //Relacion Many to one / muchos a uno
    public function tag() {
        return $this->belongsTo('App\tag', 'tag_id');
    }

}
