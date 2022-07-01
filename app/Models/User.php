<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Model{

    public $timestamps = false;

    protected $fillable = [
        'Username', 'Password', 'Email', 'Nome', 'Cognome', 'VisualizeEmail'
    ];

    protected $table = 'users';   

    public function posts(){
        return $this->hasMany('App\Models\Post', 'User', 'Id');
    }

    public function favourites(){
        return $this->hasMany('App\Models\Favourite', 'User', 'Id'); 
    }

    public function comments(){
        return $this-> hasMany('App\Models\Comment', 'User', 'Id');
    }

    public function shops(){
        return $this-> hasOne('App\Models\Comment', 'User', 'Id');
    }
}

?>