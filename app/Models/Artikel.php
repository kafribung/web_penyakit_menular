<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Artikel extends Model
{
    protected $touches = ['user'];

    protected $fillable= ['title', 'content', 'img', 'user_id'];
    
    // Relation  Many to One (User)
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


    public function getImgAttribute($value) 
    {
        return url('artikels', $value);
    } 

    // Author
    public function author()
    {
        $user = Auth::check();

        if ($user) {
            if (Auth::user()->id == $this->user_id) {
                return true;
            } else return false;
        } else return false;
    }
}
