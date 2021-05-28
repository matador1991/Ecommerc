<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Validator;
use Auth;

class LoginController extends Controller
{
    use GeneralTrait;
    public function login(Request $r){
    try {
        $rules = [
            'email' => 'required',
            'password' => 'required'
        ];
        $validator = Validator::make($r->all(), $rules);
        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }
        $data=$r->only(['email','password']);
        $token=Auth::guard('api')->attempt($data);

        if($token == null){
            return $this->returnError('e001','data not match to any results');
        }
        $user=Auth::guard('api')->user();
        $user->api_token=$token;
        return $this->returnData('user',$user);
    }catch (\Exception $ex){
        return $this->returnError($ex->getCode(),$ex->getMessage());
    }
}
    public function logout(Request $request)
    {
        $token = $request->header('auth-token');
        if ($token) {
            try {
                JWTAuth::setToken($token)->invalidate(); //logout
            } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
                return $this->returnError('', 'some thing went wrongs');
            }
            return $this->returnSuccessMessage('Logged out successfully');
        } else {
            $this->returnError('', 'some thing went wrongs');
        }

    }
}
