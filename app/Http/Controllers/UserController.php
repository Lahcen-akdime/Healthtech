<?php

namespace App\Http\Controllers;

use App\Models\Refresh_token;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\JWT;

use function Symfony\Component\Clock\now;

class UserController extends Controller
{
    public function register(Request $request){
    $user = User::create([
            'name' => $request->name ,
            'email' => $request->email ,
            'password' => $request->password ,
            'role' => $request->role ,
    ]);
    try {
        $token = JWTAuth::fromUser($user);
    } catch (JWTException $e) {
        return response()->json(['error' => 'Your token is not created : '.$e],500);
    }
    return response()->json(['message' => 'You are Registred in',
                             'token' => $token ,
                             'user' => $user ,],200);
    }
    public function login(Request $request){
        $credentials = [ 'email' => $request->email , 'password' => $request->password ];
        try {
            if(!$token = JWTAuth::attempt($credentials)){
                return response()->json(['error','The user not exist'],500); 
            }
            } catch (JWTException $e) {
                    return response()->json(['error','Could not create the token'],500); 
            }
            $refreshToken = bin2hex(random_bytes(20)) ;
            $refreshTokenCreated = Refresh_token::create([
            'refresh_token' => $refreshToken ,
            'user_id' => JWTAuth::user()->id 
            ]);
            return response()->json(['message' => 'You are logged in',
                                    'token' => $token ,
                                    'refresh_token' => $refreshTokenCreated->refresh_token ,
                                    'expires_in' => auth('api')->factory()->getTTL()*60],200);
    }
    public function logout(){
        try {
            JWTAuth::invalidate(JWTAuth::getToken());
        } catch (JWTException $e) {
           return response()->json(['error'=>'Failed to logout'],500) ;
        }
        return response()->json(['message'=>'You are logged out'],500) ;
    }
    public function refresh(){
        
    }
    // public function register(){
        
    // }
}
