<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Str;
use App\User;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        //  $this->middleware('auth:api')->except('login'); 
         
         $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        
         $credentials = request(['email', 'password']);

        if (!$token = JWTAuth::attempt($credentials)) {
            /* return response()->json([
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => Auth::factory()->getTTL() * 60
            ]);  */
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        
        return response()->json(['success'=>true,'token'=>$token],200);

        
        
       
    }
    public function register(Request $request){
        /* $this->validate($request,[
            'name'=>"required|string",
            'email'=>"required|email|unique:users",
            'password'=>"required|string|min:6|"
        ]); */
        $user = new User;
        $user->name = $request->credentials['name'];
        $user->email = $request->credentials['email'];
        $user->password = bcrypt($request->credentials['password']);
        $user->save();
        /* if($this->loginAfterSignUp()){
            return $this->login($request);
        } */
        return response()->json(['user'=>$user]);

    }

    public function checkToken(){
        return response()->json(['success'=>true],200);
    }
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me(Request $request)
    {
        /* $token = request('token');
        $user = JWTAuth::toUser($token);
        return response()->json(['user'=>$user]);  */
        
     /* $user = JWTAuth::toUser($this->bearerToken($request));
     
     $payload = JWTAuth::getPayload($this->bearerToken($request));
     return response()->json(['user'=>$user,'payload'=>$payload]); */
     

        
      $currentUser = Auth::user();
     return $currentUser;
       
    }
   /*  public function bearerToken($request)
{
   $header = $request->header('Authorization', '');
   if (Str::startsWith($header, 'Bearer ')) {
            return Str::substr($header, 7);
   }
} */

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'Successfully logged out']); 
       
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
         return $this->respondWithToken(Auth::refresh()); 
     
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60
        ]); 
    }   
    
    

}
