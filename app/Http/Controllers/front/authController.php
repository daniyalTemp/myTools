<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\config;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{


    public function pineapple()
    {

        return view('pineapple');
    }

    private function getConfig()
    {
        $config = config::all();
        if (count($config) == 0) {
            $config = config::create([
                'firstName' => 'init',
                'lastName' => 'init',
                'email' => 'init',
                'phone' => 'init',
                'instagram' => 'init',
                'telegram' => 'init',
                'github' => 'init',
                'linkedin' => 'init',
                'youtube' => 'init',
                'image' => 'init',
                'googleApi' => 'init',
                'about' => 'init',
                'birthday' => '2023-12-13'
            ]);
        } else {
            $config = $config[0];
        }
        return $config;
    }

    public function login()
    {

        $config=$this->getConfig();
        return view('front.login' , compact('config'));
    }

    public function doLogin(Request $request)
    {

        $this->validate($request,
            [
                'email'=>'required',
                'password'=>'required',
            ]
        );

        if (Auth::attempt(['email'=>$request->email , 'password'=>$request->password])){
            return redirect()->route('dashboard.index');
        }else
            return view('front.login');


    }



    public function register()
    {
        return view('front.register');
    }

    public function doRegister(Request $request)
    {
        //validate

//        dd($request->all());
        User::create([
            'name'=>'Daniyal Roomiyani',
            'email'=>$request->email,
            'password'=>$request->password
            ]);

    }

    public function logOut()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
