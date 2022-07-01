<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller{

    public function createComment(){         
        $request = request();
        $session_id = Session::get('user_id');    
        $user = User::find($session_id);
        if(!isset($user)){
            return redirect('login');
        }else{
            $user->comments()->create([
                'Post' => $request -> post_id,
                'Text' => $request -> textComment
            ]);
            return redirect('home');                 
        }   

    }


    public function findComment(){
    $session_id = Session::get('user_id');        
    $userid = User::find($session_id);            
    
    header('Content-Type: application/json');    

    $res = DB::select ("SELECT USERS.id as userId, USERS.Username as userUsername, USERS.Nome as userNome, USERS.Cognome as userCognome, 
    COMMENTS.Id as commentsId, COMMENTS.Post as commentsPost, COMMENTS.Time as commentsTime, COMMENTS.Text as commentsText
    FROM COMMENTS JOIN USERS ON COMMENTS.User = USERS.Id ORDER BY commentsId");

    $postArray = array();
    foreach($res as $row){     

    $commentsTime = $this->getTime($row->commentsTime);
        $postArray[] = array('userId' => $row->userId, 'userUsername' => $row->userUsername, 'userNome' => $row->userNome, 
                            'userCognome' => $row->userCognome, 'commentsId' => $row->commentsId, 
                            'commentsPost' => $row->commentsPost, 'commentsText' => $row->commentsText,
                            'commentsTime' => $commentsTime);
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


    public function deleteComment($comment_id){
        $comment = Comment::where("Id", $comment_id);
        $comment->delete();
        return view('deletedComment');
    }

}
?>