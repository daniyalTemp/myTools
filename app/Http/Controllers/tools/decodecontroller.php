<?php

namespace App\Http\Controllers\tools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class decodecontroller extends Controller
{

    public function decodeBase64(Request $request)
    {
        $input = $request->input('data');
        $action = "decodeBase64";

        if (!$input) {
            return response()->json(['error' => 'ورودی data یافت نشد.'], 400);
        }

        // حذف پیشوند data URI اگر وجود داشته باشد
        if (str_starts_with($input, 'data:')) {
            $input = preg_replace('#^data:.*;base64,#', '', $input);
        }

        // بررسی صحت Base64
        if (!$this->isValidBase64($input)) {
            return response()->json(['error' => 'ورودی معتبر نیست یا Base64 نیست.'], 400);
        }

        // دیکد کردن
        $decoded = base64_decode($input, true);
        if ($decoded === false) {
            return response()->json(['error' => 'دیکد Base64 ناموفق بود.'], 400);
        }

        // 🔹 اگر JSON باشد
        if ($this->isJson($decoded)) {
            $type = 'json';
            $result = json_decode($decoded, true);
            return view('tools.resultBase64', compact('result', 'type', 'action'));
        }

        // 🔹 اگر شبیه فایل (باینری) باشد
        if ($this->looksLikeBinary($decoded)) {
            $type = 'file';

            // ساخت نام فایل تصادفی
            $filename = 'decoded_' . Str::random(10  );

            // حدس زدن MIME-type (اختیاری)
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_buffer($finfo, $decoded);
            finfo_close($finfo);

            // استخراج پسوند محتمل
            $extension = explode('/', $mime)[1] ?? 'bin';
//            dd($extension);
            if ($extension == 'x-rar')
                $extension = 'rar';
            $filename .= '.' . $extension;

            // ذخیره در storage/app/public
            Storage::disk('public')->put($filename, $decoded);

            $url = asset('storage/' . $filename);

            return view('tools.resultBase64', compact('type' ,'mime', 'url', 'action'));
        }

        // 🔹 در غیر این صورت متن ساده است
        $type = 'text';
        $result = $decoded;
//        dd($type);
        return view('tools.resultBase64', compact('result', 'type', 'action'));
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
        // اگر کمتر از 10% کاراکترهای غیرقابل چاپ داشته باشه یعنی متنه
        $printable = preg_replace('/[[:print:]\s]/', '', $data);
        $ratio = strlen($printable) / max(strlen($data), 1);
        return $ratio > 0.05; // بیشتر از 5% بایت غیرقابل چاپ → فایل باینری
    }

}
