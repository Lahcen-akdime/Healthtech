<?php

namespace App\Http\Middleware;

use App\Models\Refresh_token;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class TokenMiddlware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $userRefReshtoken = Refresh_token::where('user_id','=',JWTAuth::user()->id)
                                             ->where('expires_in','>=',now())
                                             ->where('is_revoked','=',false)
                                             ->get();
            if(!JWTAuth::parseToken()->authenticate() && $userRefReshtoken){
                return to_route('refresh',$userRefReshtoken->refresh_token) ;
            };
        } catch (JWTException $e) {
            return response()->json(['error'=>'you dont have token',
                                     'description'=>$e->getMessage()],500);
        }
        return $next($request) ;
    }
}
