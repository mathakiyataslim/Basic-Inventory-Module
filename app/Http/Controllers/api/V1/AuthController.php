<?php

namespace App\Http\Controllers\api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Nette\Utils\Json;

class AuthController extends Controller
{
    
  
  public function Register(Request $request){

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password'=>$request->password,
        'phone'=>$request->phone,
    ]);
    return response()->json(['message'=>"user Register successfully"]);
  }
  public function Login(Request $request){

    if(!Auth::attempt($request->only('email','password'))){
        return response()->json(['message'=>"invalid user"],401);
    }
    $user = Auth::user();
    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json([
        'message' => "token success",
        'token' => $token,
        'user' => $user,
    ]);
  }
   
   
}
