<?php

namespace App\Http\Controllers\CAuth;

use DB;
use App\User;
use App\Events\NewUser;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Events\SendEmailReset;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class Authentication extends Controller
{
    public function register (Request $r) {
    	$rules = [
    		'email' => 'required|email|unique:users',
    		'first_name' => 'required|min:2',
    		'last_name' => 'required|min:2',
    		'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
			'password_confirmation' => 'min:6'
    	];

        $this->validate($r, $rules);
        
        $user = new User();
        $user->name = $r->first_name.''.date('s').''.date('m').''.date('H').''.date('Y').''.date('d');
        $user->email = $r->email;
        $user->first_name = $r->first_name;
        $user->last_name = $r->last_name;
        $user->password = Hash::make($r->password);
        $user->email_verified = false;
        $user->email_verification_token = Hash::make(Str::uuid());

        $save = $user->save();
        $user->attachRole([]);
        if ($save) {
			$event = event(new NewUser($user));
			if ($event) {
                Session::flash('primary', 'Please verify your email to activate your account');
				return redirect()->route('register');
			} else {
                Session::flash('error','Oops something went wrong');
				return redirect()->route('register');
			}
        }

    }

    public function verify_account ($token) {
        $user = User::where('email_verification_token', $token)->first();
        if ($user->count() == 1) {
                if (!$user->email_verified = true && !$user->email_verification_token = null) {
                $user->email_verified = true;
                $user->email_verification_token = null;
                // account verified at
                $user->save();
                Session::flash('success', 'Your account activated');
                return redirect()->route('login');
            }
            Session::flash('primary', 'Your account is already activated');
            return redirect()->route('login');
        } else {
            Session::flash('danger', 'User not found');
            return redirect()->route('login');
        }
    }

    public function login (Request $r) {
    	// validation rules
    	$rules = [
    		'email' => 'required|email',
    		'password' => 'required|alphaNum|min:6'
    	];
    	// run validation
    	$this->validate($r, $rules);
    	 
    	$credentials = $r->only('email', 'password');

        if (Auth::attempt($credentials)) {
           	// Authentication passed...
            return redirect()->intended('/');
        }
        Session::flash('error', 'invalid credentials');
        return redirect()->back();
    }

    public function logout () {
        Auth::logout();
        return redirect()->intended('/');
    }

    public function emailPasswordReset () {
        return view ('pages.forgottenPassword');
    }

    public function sendResetEmail (Request $request) {
        $this->validate($request, [
            'email' => 'required'
        ]);

        $email = DB::table('users')->where('email', '=', $request->email)
                    ->get();
        if (count($email) < 1) {
            Session::flash('error','No email matching your input');
            return redirect()->back();
        }
        // dd($email);
        if ($email != null) {
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => str_random(60),
                'created_at' => now()
            ]);
            $tokenData = DB::table('password_resets')
                ->where('email', $request->email)->first();
           $event = event(new SendEmailReset($tokenData));
           if ($event) {
                Session::flash('primary', 'Please verify your email to reset your password');
                return redirect()->back();
            } else {
                Session::flash('error','Oops something went wrong');
                return redirect()->back();
            }
        }
    }

    public function reset_password ($token) {
        $email = DB::table('password_resets')->select('email')->where('token',$token)->get();
        if (count($email) < 1) {
            return 'something went wrong in the server';
        }
        return view('pages.resetPassword')->with(['email'=>$email]);
    }

    public function reset_password_action (Request $request) {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'            
        ]);

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->update();
        Session::flash('success','Password successfully updated');
        return redirect()->route('login');
    }
}
