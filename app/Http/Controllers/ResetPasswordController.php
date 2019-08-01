<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

use App\Models\PasswordReset;
use App\Notifications\ResetPasswordRequest;
use App\User; 
use Validator;

class ResetPasswordController extends Controller
{
    /**
     * Create token password reset.
     *
     * @param  ResetPasswordRequest $request
     * @return JsonResponse
     */
    public function sendMail(Request $request)
    {
         // dd($request->email);
        $user = User::where('email', $request->email)->firstOrFail();
          // dd($user);
        $user->token = Str::random(6);
        $user->save();
        
        if ($user->save()) {
            $user->notify(new ResetPasswordRequest($user->token));
        }
        
        return view('resetPassword');

        $passwordReset = PasswordReset::updateOrCreate([
            'email' => $user->email,
        ], [
            'token' => Str::random(60),
        ]);
        if ($passwordReset) {
            $user->notify(new ResetPassword($passwordReset->token));
        }
  
        return response()->json([
        'message' => 'We have e-mailed your password reset link!'
        ]);
    }

    // public function reset(Request $request, $token)
    // {
    //     $passwordReset = PasswordReset::where('token', $token)->firstOrFail();
    //     if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
    //         $passwordReset->delete();

    //         return response()->json([
    //             'message' => 'This password reset token is invalid.',
    //         ], 422);
    //     }
    //     $user = User::where('email', $passwordReset->email)->firstOrFail();
    //     $updatePasswordUser = $user->update($request->only('password'));
    //     $passwordReset->delete();

    //     return response()->json([
    //         'success' => $updatePasswordUser,
    //     ]);
    // }

    public function forgetpassword(Request $request){
        
        return view('forgetPassword');
    }

    public function resetForm(Request $request)
    {
        return view('resetPassword');
    }



    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' =>'required',
            'password' => 'required | confirmed',
        ]);

        $user = User::where('token',$request->token)->first();

        $validator->after(function($validator) use($user) {
            if(!$user) {
                $validator->errors()->add('token', 'Token not match!!');
            }
        });
       
        
        if($validator->fails()) {
            return back()->withErrors($validator);
        }
        
        $user->token = null;
        $user->password = md5($request->password);
        if(!$user->save()) {
            return back()->widthErrors([
                'message' => 'Reset password error!!'
            ]);
        }

        return redirect('/');

    }

}