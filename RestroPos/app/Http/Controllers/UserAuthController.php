<?php

namespace App\Http\Controllers;
use \Illuminate\Support\Facades\Hash;
use App\Models\User;
use View;

use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    function login(){
        return view('auth.login');
    }

    function register(){
        return view('auth.register');
    }

    function create( Request $request){
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'phonenumber'=>'required|min:10|max:10',
            'username'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12'
        ]);

        $user =new User;
        $user->firstname = $request -> firstname;
        $user->lastname = $request -> lastname;
        $user->phonenumber = $request -> phonenumber;
        $user->username = $request -> username;
        $user->password = Hash::make($request -> password);
        $user->type = "staff";
        $query = $user->save();

        if ($query){
            return back()->with('success','You have been registered');
            
        }
        else{return back()->with('fail','Error Occured');}


    }
    function check(Request $request){
        $request->validate([
            'username'=>'required|email',
            'password'=>'required|min:5|max:12'
        ]);

         $user = User::where('username', '=', $request->username)->first();
         if($user){
             if(Hash::check($request->password, $user->password)){
                 $admin = User::where('type', '=', $request->type)->first();
                 if($admin == "admin"){
                     return redirect('admin');
                }
                 $request->session()->put('LoggedUser', $user->id );
                 return redirect('home');
             }
             else{
                 return back()->with('fail', 'Incorrect Password');
             }

         }
         else{
            return back()->with('fail','No account found for this username');
        }
    }
    function homedata(){
        if(Session()->has('LoggedUser')){

            $user = User::where('id','=', session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo'=> $user
            ];
            
            
        }
        return view('home',$data);
        
        
    }
    
    
    
  

    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('login');
        }
    }
}
