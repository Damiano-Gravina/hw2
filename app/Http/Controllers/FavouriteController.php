<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Post;
use App\Models\Favourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class FavouriteController extends Controller{

    public function index(){
        $session_id = Session::get('user_id');      
        $user = User::find($session_id);            
        if(!isset($user)){
            return redirect('login');
        }else{
            session()->flash('numFavourite', $user->Nfavourites);
            return view('favourite');                      
        }
    }

    
    public function addFavourite($post_id){
        $session_id = Session::get('user_id');  
        $user = User::find($session_id);

        $user->favourites()->create([
            'Post' => $post_id
        ]);
        return redirect('home');
    }


    public function removeFavourite($post_id, $route){
        $session_id = Session::get('user_id');  
        $post = Favourite::where("Post", $post_id)
        ->where("User", $session_id);
        $post->delete();
        return redirect($route);
    }


    public function getFavourite(){
        $session_id = Session::get('user_id');                   
    
        header('Content-Type: application/json');    
        $res = Favourite::where("User", $session_id)   
        ->get();

        $postArray = array();

        foreach($res as $row){
            $postArray[] = array('favouriteId' => $row->Id, 'favouriteUser' => $row->User, 'favouritePost' => $row->Post);
        }
    echo json_encode($postArray);
    }

}
?>