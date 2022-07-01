<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Shop extends Model{

    public $timestamps = false;

    protected $fillable = [
        'SedeNegozio', 'OrariApertura'
    ];

    protected $table = 'shops';   

    public function user(){
        return $this->belongsTo('User', 'Id', 'User');     
    }
}
?>