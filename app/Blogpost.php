<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blogpost extends Model
{

    protected $fillable = ['title','content','image','flag','user_id'];
    protected $table = 'posts';
    //

    public function user(){

        return $this->belongsTo('App\User');
    }
}
