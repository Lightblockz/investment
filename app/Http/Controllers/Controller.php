<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // public $afref_url = "http://157.245.141.146:8007/api/";

    public $url = "http://localhost:8000/";

    public function _mailCall ($request, $url)
    {
      try {

        // $data = Json_encode($request, TRUE);

        $curl = \curl_init();
        \curl_setopt_array(
            $curl, array(
              CURLOPT_URL => $this->url.$url,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 100,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => $request,
              CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json"
            ),
        ));

        dd($this->url.$url);

        $response = \curl_exec($curl);
        dd($response);
        $err = \curl_error($curl);
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
}
