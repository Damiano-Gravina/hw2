<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller{

    public function register(){
        $request = request();  

        echo($request);

        $errors = $this->errorVerify($request);
       
        if(count($errors) == 0){
            $newUser = new User;
            $newUser->Username = $request->input('username');
            $newUser->Password = $request->input('password');
            $newUser->Nome = $request->input('name');
            $newUser->Cognome = $request->input('surname');
            $newUser->Email = $request->input('email');                        
            $newUser->save();

            if ($newUser) {
                Session::put('user_id', $newUser->id);  
                return redirect('home');
            } 
            else {
                return redirect('register')->withInput();     
            }
        }
        else{ 
            return $this->errorRegist($errors);    
        }
    }


    private function errorVerify($data) {
        $error = array();
    
        if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $data['username'])) {
            $error[] = "Username non valido";
        } else {
            $username = User::where('Username', $data['username'])->first();
            if ($username !== null) {
                $error[] = "Questo username non è disponibile";
            }
            if (strlen($data["username"]) > 50) {
                $error[] = "Username troppo lungo";
            }
        };



        if (strlen($data["password"]) < 8) {
            $error[] = "Password troppo corta";
        } 
        if (strlen($data["password"]) > 50 ){
            $error[] = "Password troppo lunga";
        }



        if (strcmp($data["password"], $data["confirm_password"]) != 0) {
            $error[] = "I campi password e conferma Password sono differenti";
        }



        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = "Email non valida";
        } else {
            $email = User::where('Email', $data['email'])->first();
            if ($email !== null) {
                $error[] = "Questa email è già in uso";
            }
        }
        return $error;        
    }


    private function errorRegist($errors){
        session()->flash('error', $errors);
        return redirect('register')->withInput();
    }


    public function checkUsername($query) {
        $exist = User::where('Username', $query)->exists();    
        return ['exists' => $exist];   
    }


    public function checkEmail($query) {
        $exist = User::where('Email', $query)->exists();
        return ['exists' => $exist];
    }

    
    public function index() {
        return view('register');
    } 
}
?>
