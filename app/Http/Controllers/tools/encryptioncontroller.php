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

        $result = openssl_encrypt(json_encode($request->data), 'aes-256-cbc', $key, false, $iv); //Decrypt

        return view('tools.result', compact('result', 'myKey', 'iv', "action"));

    }

    public function decrypt(Request $request)
    {
        $iv = $request->iv;
        $myKey = $request->key;
        $action = "Decryption";
        $key = hash('sha256', $myKey, true);
        $encrypt = openssl_decrypt($request->data, 'aes-256-cbc', $key, false, $iv);

        $result = (json_decode(json_decode($encrypt)));
        if ($result== null)
            $result= $encrypt;

//        dd(gettype($result));
        return view('tools.result', compact('result', 'myKey', 'iv', "action"));

    }
}
