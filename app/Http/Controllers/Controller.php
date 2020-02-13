<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $url = "http://157.245.141.146:8007/";

    public function _sendMail($data , $method , $url)
    {
        // dd($this->url.$url);
      try {
        $data = Json_encode($data, TRUE);
        $curl = \curl_init();
        \curl_setopt_array(
            $curl, array(
              CURLOPT_URL => $this->url.$url,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => $method,
              CURLOPT_POSTFIELDS => $data,
              CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json"
            ),
        ));

        $response = \curl_exec($curl);
        $err = \curl_error($curl);
        dd($response);
        // $response = Json_decode($response);
        \curl_close($curl);

        if ($response == NULL) {
            return false;
        }else {
            return $response;
        }

      } catch (\Exception $e) {

      }

    }


    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message)
    {
    	$response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];

        return response()->json($response, 200);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'data'    => $errorMessages,
            'message' => $error,
        ];
        
        return response()->json($response, $code);
    }
}
