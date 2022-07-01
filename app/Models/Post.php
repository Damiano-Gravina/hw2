<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Modes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
 
class Post extends Model{

    public $timestamps = false;
    
    protected $table = 'posts';   

    protected $fillable = [
        'Title', 'Text'
    ];

    public function user(){
        return $this->belongsTo('User', 'Id', 'User');     
    }

    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }
}

?>