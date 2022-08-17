<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Jobs\VerifyUserJobs;
use App\Jobs\PasswordResetJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use Validator;
use JWTAuth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;
use App\Traits\ApiResponseWithHttpSTatus;

class AuthController extends Controller
{
    use ApiResponseWithHttpSTatus;
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'accountVerify',
        'forgotPassword' , 'updatePassword']]);
    }
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
    	$validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        if (! $token = JWTAuth::attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->createNewToken($token);
        //return "Hello";
    }
    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request) {

        //echo $request;
        //$data = [ 'data' => $request->all() ];
        // echo $data;

        //echo $value;
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6', //need to check with confirmed password

        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $user = User::create(array_merge(
                    $validator->validated(),
                    ['password' => bcrypt($request->password),'slug'=>Str::random(15),'token'=>Str::random(20),'status'=>'active']
                ));

        if($user)
        {
            $details = ['name'=>$user->name, 'email'=>$user->email ,
            'hashEmail'=>Crypt::encryptString($user->email),
            'token'=>$user->token];
            dispatch(new VerifyUserJobs($details));
        }
        return $this->apiResponse('User successfully registered',$data=$user,Response::HTTP_OK,true);
    }

/**
     * Account verify (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function accountVerify($token,$email) {
        //echo $email;
        //$user = User::where([['email',Crypt::decryptString($email)],['token',$token]])->first();
        //decrypt didn't work here for errors
        $user = User::where([['token',$token]])->first();
        if($user->token == $token){
                $user->update([
                    'verify'=>true,
                    'token'=>null
                ]);
                return redirect()->to('http://localhost:8000/verify/success');
            }
            return redirect()->to('http://localhost:8000/verify/invalid_token');
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout() {
        auth()->logout();
        return $this->apiResponse('Signed out successfully!',null,Response::HTTP_OK,true);

    }
    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile() {
        return $this->apiResponse('Sign out success',$data=auth()->user(),Response::HTTP_OK,true);
    }
    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token){
            $data['access_token'] = $token;
            $data['token_type'] = 'bearer';
            $data['expires_in'] = auth()->factory()->getTTL() * 60;
            $data['user'] = auth()->user();
            return $this->apiResponse('success',$data,Response::HTTP_OK,true);
    }

    public function forgotPassword(Request $request)
    {

            $user = User::where('email', $request->email)->first();
            if($user)
            {
                $token = Str::random(15);
                $details = ['name'=>$user->name, 'token'=>$token,'email'=>$user->email,
                'hashEmail'=>Crypt::encryptString($user->email)];
                if(dispatch(new PasswordResetJob($details)))
                {
                    DB::table('password_resets')->insert([
                        'email'=>$user->email,
                        'token'=>$token,
                        'created_at'=>now(),
                    ]);
                    return $this->apiResponse('Password reset link has been sent to your email address',null,Response::HTTP_OK,true);
                }
            }else{
                return $this->apiResponse('Invalid email',null,Response::HTTP_OK,false);

            }

    }

    public function updatePassword(Request $request)
    {
        $validator= Validator::make($request->all(),[
            'email' => 'required',//'|email|exists:users',
            'password' => 'required|string|min:6',
            'token' => 'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }
        $email=Crypt::decryptString($request->email);

        //echo $email;
        $user = DB::table('password_resets')
                      ->where(['email' => $email,'token' => $request->token]) //'email' => $request->email,
                      ->first();

        if(!$user)
        {
            return $this->apiResponse('Invalid email or token',null,Response::HTTP_OK,false);

        }
        else
        {
            $data = User::where('email',$email)->first();//$user->email
            $data->update(['password' => Hash::make($request->password)]);
            DB::table('password_resets')->where(['email'=> $email])->delete();//$user->email
            return $this->apiResponse('Your password has been changed!',null,Response::HTTP_OK,true);

        }

            // $user = User::where('email', $request->email)
            //             ->update(['password' => Hash::make($request->password)]);

            // DB::table('password_resets')->where(['email'=> $request->email])->delete();

            // return redirect('/login')->with('message', 'Your password has been changed!');

    }

}


