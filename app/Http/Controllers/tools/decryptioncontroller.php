<?php

namespace App\Http\Controllers\tools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isJson;

class decryptioncontroller extends Controller
{
    public function decrypt(Request $request)
    {
        $iv = $request->iv;
        $myKey = $request->key;
        $action = "Decryption";
        $key = hash('sha256', $myKey, true);
        $decrypt = openssl_decrypt($request->data, 'aes-256-cbc', $key, false, $iv);
//        dd($decrypt);

//        dd($this->validateJson(""$encrypt""));
        $result = ((json_decode($decrypt)));
        if ($result== null)
            $result= $decrypt;

        return view('tools.result', compact('result', 'myKey', 'iv', "action"));

    }
    private function validateJson($value)
    {

        json_decode($value);
        return json_last_error() === JSON_ERROR_NONE;
    }
}
