<?php

namespace App\Http\Controllers\tools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class encodecontroller extends Controller
{


    public function encodeBase64(Request $request)
    {
        $input = $request->input('data');
        $action = "encodeBase64";

        // اگر فایل ارسال شده بود، از فایل استفاده کن
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $file = $request->file('file'); // ✅ اصلاح شد
            $type = 'file';

            // محتوای فایل را بخوان و به base64 تبدیل کن
            $content = File::get($file->getRealPath());
            $result = base64_encode($content);

            return view('tools.resultBase64', compact('type', "result", 'action'));
        }

        // اگر ورودی متنی (data) ارسال شده بود
        if (!$input) {
            return response()->json(['error' => 'ورودی data یافت نشد.'], 400);
        }

        // اگر JSON باشه
        if ($this->isJson($input)) {
            $type = 'json';
            $result = base64_encode($input);
        }
        // اگر مسیر فایل روی سیستم باشه
        elseif (File::exists($input)) {
            $type = 'file';
            $content = File::get($input);
            $result = base64_encode($content);
        }
        // اگر آرایه باشه
        elseif (is_array($input)) {
            $type = 'json';
            $result = base64_encode(json_encode($input));
        }
        // در غیر اینصورت متن ساده است
        else {
            $type = 'text';
            $result = base64_encode($input);
        }

        return view('tools.resultBase64', compact('type', "result", 'action'));
    }
    private function isValidBase64($string)
    {
        // از regex قوی استفاده می‌کنیم
        if (!is_string($string)) return false;
        if (strlen($string) % 4 !== 0) return false;

        return preg_match('/^[A-Za-z0-9+\/=]+$/', $string);
    }

    private function isJson($string)
    {
        json_decode($string);
        return json_last_error() === JSON_ERROR_NONE;
    }

    private function looksLikeBinary($data)
    {
        // بررسی وجود بایت‌های غیر قابل چاپ
        return preg_match('~[^\x20-\x7E\t\r\n]~', $data) > 10;
    }


}
