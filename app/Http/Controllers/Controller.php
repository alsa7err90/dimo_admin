<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sendResponse($result, $message)
    {
        return [
            'success' => true,
            'data'    => $result,
            'message' => __($message),
        ];
    }
//    2
    public function sendError($error, $errorMessages = [])
    {
        $response = [
            'success' => false,
            'message' => __($error),
            'data'    =>  null
        ];
        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }
        return  $response ;
    }

    public function jsonSuccess($result, $message ="Success Request",$code = 200){
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => __($message) ,
        ];
        return response()->json($response, $code);
    }

    public function jsonError($message,$code = 200){
        $response = [
            'success' => false,
            'data'    => '',
            'message' => __($message),
        ];
        return response()->json($response, $code);
    }

    public function returnApi($data){
        if($data[0] == "success")
            return $this->jsonSuccess($data[2],$data[1]);
        return $this->jsonError($data[1]);
    }

}
