<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Traits\GeneralTrait;
use GuzzleHttp\ClientTrait;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use GeneralTrait;
   public function getAllOrder(Request $request){
       $token = $request->header('auth-token');
       if ($token) {
           try {
              $order=Order::paginate(5);
               return $this->returnData('Orders',$order);
           }catch (\Exception $ex){
               return $this->returnError($ex->getCode(),$ex->getMessage());
           }
       }
       else
           return $this->returnError('', 'some thing went wrongs');

   }
}
