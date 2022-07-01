<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Comment extends Model {

    protected $table = 'COMMENTS';

    public $timestamps = false;

    protected $fillable = [
        'Post', 'Text'
    ];

    public function user() {
        return $this->belongsTo("App\Models\User", 'Id', 'User');
    }

    public function post() {
        return $this->belongsTo("App\Models\Post");
    }

}

?>