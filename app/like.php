<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class like extends Model {

    protected $table = 'likes';
    protected $fillable = [
        'user_id', 'blog_id'
    ];

    //Relacion Many to one / muchos a uno
    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

}
