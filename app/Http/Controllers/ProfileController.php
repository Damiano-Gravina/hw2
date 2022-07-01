<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller{

    public function userProfile(){
        $session_id = Session::get('user_id');      
        $user = User::find($session_id);            
        if(!isset($user)){
            return redirect('login');
        }else{
            if($user->Negozio){
                $shop = Shop::where('User', $session_id)->get();
                session()->flash('userData', $user);
                session()->flash('shopData', $shop);
                return view('myProfileShop');
            }else{
                session()->flash('userData', $user);
                return view('myProfile');      
            }
        }
    }


    public function userProfileWithUsername($username_id){
        $session_id = Session::get('user_id');      
        $user = User::find($session_id);      
        $user_selected = User::find($username_id); 
        if(!isset($user)){
            return redirect('login');
        }else{   
            $user = User::find($username_id);
            if($session_id == $username_id){
                return redirect('userProfile');
            }else{
                if($user_selected->Negozio){
                    $shop = Shop::where('User', $username_id)->get();
                    session()->flash('userData', $user);
                    session()->flash('shopData', $shop);
                    return view('UserProfile');
                }
                session()->flash('userData', $user);
                session()->flash('shopData', $user);
                return view('UserProfile');
            }    
        }
    }


    public function changeEmailVisualization(){
        $session_id = Session::get('user_id');
        $user = User::find($session_id);

        // if($user->VisualizeEmail == "1"){
        //     $user->VisualizeEmail = '0';
        // }else{
        //     $user->VisualizeEmail = '1';
        // }
        // $user->save();

        if($user->VisualizeEmail == "1"){
            DB::update("UPDATE `users` SET `VisualizeEmail`='0' where Id = $session_id");
        }else{
            DB::update("UPDATE `users` SET `VisualizeEmail`='1' where Id = $session_id");
        }
        return redirect('userProfile');
    }
    


    public function changeShopDetails(){
        $session_id = Session::get('user_id');
        $user = User::find($session_id);

        $request = request();  
        $sedeNegozio = $request->shop_address;
        $orariApertura = $request->shop_open;

        DB::update("UPDATE `shops` SET `OrariApertura` = '$orariApertura', `SedeNegozio` = '$sedeNegozio' where User = '$session_id'");
        return redirect('userProfile');
    }
}
?>