<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class PostController extends Controller{
    
    public function getPost(){
        $session_id = Session::get('user_id');        
        $userid = User::find($session_id);           
        
        header('Content-Type: application/json');    

        $res = DB::select ("SELECT USERS.id as userId, USERS.Username as userUsername, USERS.Nome as userNome, USERS.Cognome as userCognome, USERS.Negozio as userNegozio,
        POSTS.Id as postsId, POSTS.User as postsUserId, POSTS.Title as postsTitle, POSTS.Text as postsText, POSTS.Time as postsTime, POSTS.Ncomments as postNcomments
        FROM POSTS JOIN USERS ON POSTS.User = USERS.Id ORDER BY postsId DESC");

        $postArray = array();
        foreach($res as $row){     
        $postsTime = $this->getTime($row->postsTime);
            $postArray[] = array('userId' => $row->userId, 'userUsername' => $row->userUsername, 'userNome' => $row->userNome, 'userNegozio' => $row->userNegozio, 
                                'userCognome' => $row->userCognome, 'postsId' => $row->postsId, 'postsUserId' => $row->postsUserId, 
                                'postsTitle' => $row->postsTitle, 'postsText' => $row->postsText, 'postsNcomments' => $row->postNcomments,
                                'postsTime' => $postsTime);
        }
        echo json_encode($postArray);   
    }


    function getTime($time) {   
        date_default_timezone_set("Europe/Rome");       
        $unixTime = strtotime($time);              
        $deltaTime = time() - $unixTime;           

        if ($deltaTime /60 <1) {
            return intval($deltaTime%60)." secondi fa";
        } else if (intval($deltaTime/60) == 1)  {
            return "1 minuto fa";  
        } else if ($deltaTime / 60 < 60) {
            return intval($deltaTime/60)." minuti fa";
        } else if (intval($deltaTime / 3600) == 1) {
            return "1 ora fa";
        } else if ($deltaTime / 3600 <24) {
            return intval($deltaTime/3600) . " ore fa";
        } else if (intval($deltaTime/86400) == 1) {
            return "Ieri";
        } else if ($deltaTime/86400 < 30) {
            return intval($deltaTime/86400) . " giorni fa";
        } else {
            $unixTime = date('d/m/y', $unixTime);       
            return $unixTime; 
        }
    }



    public function newPost(){
        $session_id = Session::get('user_id');      
        $user = User::find($session_id);            
        if(!isset($user)){
            return redirect('login');
        }else{
            return view('createPost');                      
        }
    }


    public function createPost(){     
        $request = request();                     
        $title = $request->title;
        $text = $request->text;

        if(strlen($title) < 25 && $title != "Titolo annuncio" && strlen($text) > 0 && strlen($text) < 255){
            $session_id = Session::get('user_id');  
            $user = User::find($session_id);   

            $user->posts()->create([                   
                'Title' => $title,
                'Text' => $text]);
            return view('publishedPost');
        }
    }

    public function deletePost($post_id){ 
        $post = Post::where("Id", $post_id);
        $post->delete();
        return view('deletedPost');
    }
    
}
?>