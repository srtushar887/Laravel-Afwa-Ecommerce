<?php

namespace App\Http\Controllers;

use App\Mail\RegVerifyEmail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CustomLoginController extends Controller
{
    public function custom_register(Request $request)
    {
        $this->validate($request,[
           'name' => 'required',
           'email' => 'required',
           'phone_number' => 'required',
           'password' => 'required',
        ]);


        if ($request->password != $request->password_confirmation){
            return back()->with('pass_not_match','Password Not Match');
        }else{

            $code = rand(000000,999999);

            $url = route('user.account.verify.check',$code);


            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->password = $request->password;
            $user->account_status = 1;
            $user->ver_code = $code;
            $user->save();


            $to = $user->email;
            $msg = array(
                'vlink' => $url,
                'name'=> $user->name
            );

            Mail::to($to)->send(new RegVerifyEmail($msg));
            return redirect(route('login'))->with('success_reg','We have send a verification email in your . Please Verify you Email');


        }





    }


    public function user_account_verify($code)
    {
        if ($code)
        {
            $user = User::where('ver_code',$code)->first();
            if ($user){
                $user->ver_code = "";
                $user->account_status = 2;
                $user->save();

                return redirect(route('front'))->with('success','Account Successfully Activate');

            }else{
                return redirect(route('login'))->with('alert','Code Not Match');
            }
        }else{
            return redirect(route('login'))->with('alert','Verification Failed');
        }
    }


}
