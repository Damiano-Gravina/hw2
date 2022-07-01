<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller{       
    public function index(){
        $session_id = Session::get('user_id');      
        $user = User::find($session_id);            
        if(!isset($user)){
            return redirect('login');
        }else{
            session()->flash('userData', $user);
            return view('home');                      
        }
    }


    public function getPlaylists(){        
        $session_id = Session::get('user_id');      
        $user = User::find($session_id);            
        if(!isset($user)){
            return redirect('login');
        }else{
            header('Content-Type: application/json');  
            $playlists = Playlist::all();
            $postArray = array();
            foreach($playlists as $row){     
                $postArray[] = array('PlaylistId' => $row->Id, 'playlistName' => $row->Name, 'playlistURL' => $row->PlaylistURL);
            }
            echo json_encode($postArray);                       
        } 
    }
}
?>