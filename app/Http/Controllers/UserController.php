<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;  
use App\Http\Requests;  
use Illuminate\Database\Query\Builder;
use Gregwar\Captcha\CaptchaBuilder;  
use Session;  
use App\member;
use App\article;
use App\User;
use App\path_to_delete;
use App\article_collect;
use DB;
use Illuminate\Support\Facades\Auth;
use Mail;
 


class UserController extends Controller
{
    //
    public function toLogin() {
    	 if(!empty(session('user_id'))) {
             return redirect('index');
         }
        return view('login');
    }

    public function toRegister() {
    	return view('register');
    }

    public function captcha($tmp)  //生成验证码
    {  
        //生成验证码图片的Builder对象，配置相应属性  
        $builder = new CaptchaBuilder;  
        //可以设置图片宽高及字体  
        $builder->build($width = 100, $height = 40, $font = null);  
        //获取验证码的内容  
        $phrase = $builder->getPhrase();  
        //把内容存入session  
        Session::flash('milkcaptcha', $phrase);  
        //生成图片   
        header("Cache-Control: no-cache, must-revalidate");  
        header('Content-Type: image/jpeg');  
        $builder->output();  
    }  

    public function checkRegis(Requests\RegisterRequest $request) {

    	if(Session::get('milkcaptcha') !=  $request->get('captcha')) {
    		return view('Error.CaptchaError');
    		
    	} else {
    		$user = new member();
    		$user->name = $request->get('userName');
    		
    		if(count(DB::table('users')->where('name',$user->name)->get()) > 0 ) {
    			
                return view('Error.unameError');//查重
    		}
    		

    		$user->password = $request->get('password');
    		$user->email = $request->get('email');

            if(count(DB::table('users')->where('email',$user->email)->get()) > 0 ) {
                
                return view('Error.emailError');//查重
            }
    		
            $user->phoneNum = $request->get('tel');
    		$user->save();
            session(['user' => $user]);
            return redirect('/regisSuc');


            //return redirect('/'); 
        }
    }

    public function home() {
    	return view('Home.index');
    }


    public function login(Request $request) {
    	
        $user = member::find($request->get('id'));
        
        if($user->password == $request->get('password')) {
            session(['user_id' => $request->get('id')]);
            return redirect('/index');
        }  else {
            return view('Error.LoginError');
        }
    }

    public function index() {//渲染展示首页
        if(empty(session('user_id'))) {
            return view('login');
        }
        $id = session('user_id');
        $data = member::find($id);
        $articles =  \App\article::latest()->SimplePaginate(10);
        $collects = DB::table('article_collects')->where('user_id',$id)->get();
        $collect_article_ids = array();
        foreach ($collects as $collect) {
            # code...
            $collect_article_ids[] = $collect->article_id;

        }
        $url;
        $url1 = '/article_collect/';
        $url2 = '/article_collect_cancel/';

        return view('Home.index',compact('data','articles','collect_article_ids','url','url1','url2'));
    }

    public function logout(Request $request) {
        session::forget('user_id');
        return redirect('/');
    }

    public function showRegis() {
        $user = session('user');
        //dd($user);
        // $users = DB::table('users')->where('name',$user->name)->get();
        // foreach($users as $u) {
        //     $id = $u->id;
        // }
        //dd($id);
        return view('showRegis',compact('user'));
    }

    public function toEditProfile() {
        $id = session('user_id');
        $user = member::find($id);
        return view('Home.editProfile',compact('user'));

    }

    public function EditProfile(Request $request) {
        $id = session('user_id');
        $user = member::find($id);

        $old_path = $user->avatar_path;

        $destripath = 'Uploads/avatar/';
        $newImg = $request->file('avatar');
        $newName = $request->get('userName');
        $newIntro = $request->get('intro');
        
        if($newImg != null) {
            $ImgName = $user->name.time().$newImg->getClientOriginalName();
            $newImg->move($destripath,$ImgName);
            $user->avatar_path = '/'.$destripath.$ImgName;
        }

        $user->name = $newName;
        $user->user_intro = $newIntro;
        $user->save();

        if($newImg != null) {
            $path = new path_to_delete();
            $path->path = $old_path;
            $path->save();
        }

        return redirect('/profile');
    }
   
    public function toEditPsw() {
        $id = session('user_id');
        $user = member::find($id);
        return view('Home.toEditPsw',compact('user'));
    }

    public function ArticleCollect($id) {
        $collecter = new article_collect();
        $collecter->user_id = session('user_id');
        $collecter->article_id = $id;
        $collecter->save();
        return redirect('index');
    }

    public function ArticleCollect_cancel($id) {
        $uid = session('user_id');
        DB::table('article_collects')
        ->where('user_id', $uid)
        ->where('article_id', $id)
        ->delete();
        return redirect('/index');
    }







    public function getCollect() {
        //dd('123');
        $id = session('user_id');
        $user = member::find($id);
        $articles_id = DB::table('article_collects')
                        ->where('user_id',$id)
                        ->get();

        $articles = array();

        foreach ($articles_id as $article_id) {
             # code...
            $articles[] = article::find($article_id->article_id);
         }

        return view('Home.myCollect',compact('user','articles'));

    }
 }
