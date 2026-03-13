<?php

namespace App\Http\Controllers;

use App\Events\UserRegistered;
use App\Mail\ForgetPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Testing\Fluent\Concerns\Has;


use function Symfony\Component\Clock\now;

class AuthController extends Controller
{
    //register-login//
    public function register(){
        return view('auth.register');
    }
    public function registerSave(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|',
            'phone' => 'required|max:10|min:10'
        ]);
        $user = User::create($request->all());
       
         event(new UserRegistered($user));
         return redirect()->route('login');
    }
    public function login(){
        return view('auth.login');
    }
    public function loginsave(Request $request){
       
        if( Auth::attempt($request->only('email','password'))){
            // if(Auth::user()->role === 'admin'){
            //      return redirect()->route('admin');
            // }
            // elseif(Auth::user()->role === "user"){
            //     return redirect()->route('user.home');  
            // }   
            
            if(Auth::user()->hasRole('admin')){
                
                return redirect()->route('admin');
            }
             elseif(Auth::user()->HasRole('manager')){
                return redirect()->route('admin');
            }
            elseif(Auth::user()->HasRole('user')){
                return redirect()->route('user.home');
            }
        }
        else{
            return redirect()->route('login');
        }
       
    }
    public function logout(Request $request){
        Auth::logout();
        return Redirect()->route('login');
    }

    //forget-password//
    public function forget_password(){
        return view('auth.forget_password');
    }

    public function forget_pass_save(Request $request){
        $request->validate([
            'email' => 'required'
        ]);

       $user = User::where('email',$request->email)->first();

       if($user){
             $token = Str::random(60);
           DB::table('password_reset_tokens')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => now()
            ]);
            
            // Mail::send('email.forget_password',
            // compact('token','user'),
            // function($msg) use ($user){
            //     $msg->to($user->email);
            //     $msg->subject('Forget Password');
            // });
          Mail::to($user->email)->send(new ForgetPasswordMail($token ,$user->email));
            return redirect()->route('login')->with('status', 'Email sending');
       }
      return redirect()->back()->withErrors(['email' => 'Not Found Email.']);
    }
    public function reset_password($token,$email){
        return view('auth.update_password',compact('email','token'));
    }
    public function update_password(Request $request){
         $resetpass = DB::table('password_reset_tokens')->where('token',$request->token)->where('email',$request->email)->first();

         if($resetpass){
          $user = User::where('email',$request->email)->first();
            $user->password = Hash::make($request->password);
            $user->save();
            DB::table('password_reset_tokens')->where('token',$request->token)->where('email',$request->email)->delete();
            return redirect()->route('login');
            
         }
         dd("token expired");
        
    }
   
    public function setLang(Request $request){
        Session::put('locale',$request->lang);
        return redirect()->back();
    }
   
  }

 



