<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Session;
use App\member;

class MailController extends Controller
{
    //
    public function changePsw(Request $request) {
    	$id = session('user_id');
    	$user = member::find($id);
    	$u_email = $user->email;

    	$random_num = rand(10000,99999);
		session(['changePassword' => $random_num]);
    	$str = '您正在通过此邮箱修改密码，验证码为 '.$random_num.' 如非本人行为， 请勿做任何操作。';

    	Mail::raw($str,function($message) use( $u_email) {
    		$to = $u_email;
    		$message->to($to)->subject('修改密码邮件');
    	});
    }

    public function checkChangePsw(Request $request) {
    	if($request->get('verify') == session('changePassword')) {
    		$id = session('user_id');
    		$user = member::find($id);
    		$user->password = $request->get('password');
    		$user->save();
    		session::forget('changePassword');//删除掉这次操作的验证码
    		return redirect('/profile');
    	}
    	else return view('Error.CaptchaError');
    }

    public function toAuth_email() {
    	$id = session('user_id');
    	$user = member::find($id);
    	return view('Home.auth_email',compact('user'));
    }

    public function auth_email(Request $request) {
    	$id = session('user_id');
    	$user = member::find($id);
    	$u_email = $user->email;
		$random_num = rand(10000,99999);
		session(['authEmail' => $random_num]);
		$str = '您正在认证此邮箱，验证码为 '.$random_num.' 如非本人行为， 请勿做任何操作。';
    	Mail::raw($str,function($message) use( $u_email) {
    		$to = $u_email;
    		$message->to($to)->subject('认证邮件');
    	});
    }

    public function checkAuth(Request $request) {
    	

    	if($request->get('verify') == session('authEmail')) {
    		$id = session('user_id');
    		$user = member::find($id);
    		
    		$user->is_auth = 'true';
    		$user->save();
    		session::forget('authEmail');//删除掉这次操作的验证码
    		return redirect('/profile');
    	}
    	else return view('Error.CaptchaError');
    }
}
