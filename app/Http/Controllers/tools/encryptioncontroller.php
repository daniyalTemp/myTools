<?php

namespace App\Http\Controllers\tools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isJson;

class encryptioncontroller extends Controller
{

    public function encrypt(REQUEST $request)
    {
        $iv = $request->iv;
        $myKey = $request->key;

        $action = "Encryption";
        $key = hash('sha256', $myKey, true);
        if (json_decode($request->data) == null) {
            $rawData = $request->data;
        }
        else {
            $rawData = json_decode($request->data);
            $rawData = json_encode($rawData);
        }

//        dd($rawData);

        $result = openssl_encrypt($rawData, 'aes-256-cbc', $key, false, $iv); //Decrypt

        return view('tools.result', compact('result', 'myKey', 'iv', "action"));

    }


}
