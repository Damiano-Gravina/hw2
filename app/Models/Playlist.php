<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Modes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
 
class Playlist extends Model{

    public $timestamps = false;
    
    protected $table = 'playlists';   

}