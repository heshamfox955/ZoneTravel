<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;
use Mail;
use Carbon\Carbon;
use App\Mail\UserResetPassword;

class AdminAuth extends Controller
{
    public function login() {
        return view('admin.login');
    }

    public function postLogin(Request $request) {
        $remeberme = request('remeberme') == 1 ? true : false ;
        if(auth()->attempt(['email' => request('email'), 'password' => request('password')], $remeberme)) {
            return redirect()->route('home')->with('success', trans('admin.login_success'));
        } else {
            return redirect()->route('login')->with('error', trans('admin.email_or_password_incorrect'));
        }
    }

    public function forgetPassword() {
        return view('admin.admins.forget_password');
    }

    public function postForgetPassword() {
        $user = User::where('email', request('email'))->first();
        if(!empty($user)) {
            $token = app('auth.password.broker')->createToken($user);
            $data = DB::table('password_resets')->insert([
                'email'         => $user->email,
                'token'         => $token,
                'Created_at'    => Carbon::now()
            ]);
            Mail::to($user->email)->send(new UserResetPassword(['data' => $user, 'token' => $token]));
            session()->flash('success', trans('admin.reset_link'));
            //return new UserResetPassword(['data' => $user, 'token' => $token]);
            return back();
        }
        return back();
    }

    public function resetPassword($token) {
        $check_token = DB::table('password_resets')->where('token', $token)->where('created_at','>',Carbon::now()->subHour(2))->first();
        if(!empty($check_token)) {
            return view('admin.admins.reset_password', ['data'=>$check_token]);
        } else {
            return redirect('forget/password');
        }
    }

    public function postResetPassword($token) {
        $this->validate(request(), [
            'password'                 => 'required|confirmed',
            'password_confirmation'    => 'required',
        ]);
        $check_token = DB::table('password_resets')->where('token', $token)->where('created_at','>',Carbon::now()->subHour(2))->first();
        if(!empty($check_token)) {
            $user = User::where('email', $check_token->email)->update(['email' => $check_token->email, 'password' => bcrypt(request('password'))]);
            DB::table('password_resets')->where('email', request('email'))->delete();
            return redirect()->route('login');
        } else {
            return redirect('forget/password');
        }
    }

    public function logout() {
        auth()->logout();
        return redirect('/login')->with('success', trans('admin.logout_success'));
    }

}
