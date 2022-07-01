<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller{

    public function checkLogin(){
        $request = request();                       
        $user = User::where('username', $request->username)
                ->where('password', $request->password)
                ->first();                         
        if($user){
            Session::put('user_id', $user->Id);  
            return redirect('home');
        }
        else{
            return $this->errorLogin();
        }
    }

    private function errorLogin(){
        $error = "Username e/o password errati";
        session()->flash('error', $error);
        return redirect('login')->withInput();
    }


    public function index(){
        $session_id = Session::get('user_id');      
        $user = User::find($session_id);            
        if(isset($user)){
            return redirect('home');
        }else{
            return view('login');          
        }
    }

    public function logout(){
        Session::flush();
        return redirect('login');
    }
}

?>

