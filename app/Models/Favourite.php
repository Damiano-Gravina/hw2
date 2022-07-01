<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Favourite extends Model{

    public $timestamps = false;

    protected $fillable = [
        'Post'
    ];

    protected $table = 'favourites';   

    public function user(){
        return $this->belongsTo('App\Models\Post', 'Id', 'User');     
    }
}

?>