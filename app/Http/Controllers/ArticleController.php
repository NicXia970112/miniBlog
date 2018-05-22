<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\member;
use App\Http\Requests;
use App\article;
//use Request;
use Input;
use DB;
use Illuminate\Database\Query\Builder;
use App\path_to_delete;

class ArticleController extends Controller
{
    //
    public function toEdit() {
    	$id = session('user_id');
    	$user = member::find($id);
    	return view('Home.editArticle',compact('user'));
    }

    public function edit(Requests\articleRequest $request) { //Requests\articleRequest
    	$destinationPath = 'Uploads/Articles/';
    	$user = member::find(session('user_id'));

    	//dd($user);
    	$article = new article();
    	$article->title = $request->get('title');
    	$article->intro = $request->get('intro');
    	$article->content = $request->get('content');
    	$article->tag_1 = $request->get('tag');
    	//$img = $_FILES["articlePic"];

    	$article->user_id = $user->id;
    	$article->user_name = $user->name;
    	
    	$img = $request->file('articlePic');
    	$imgName = $article->user_name.time().$img->getClientOriginalName(); 
     	$img->move($destinationPath,$imgName);
     	$article->img_path = '/'.$destinationPath.$imgName;

    	//dd($imgName);
    	 
    	$article->save();
    	return redirect('/index');
    }

    public function search(Request $request) {
     	$info = $request->get('info');
    	
  
        $articles0 = DB::table('articles')->where(
                    
                     'title','like','%'.$info.'%'
                 )->get();

        $articles1 = DB::table('articles')->where(
                    
                     'intro','like','%'.$info.'%'
                 )->get();

        $articles2 = DB::table('articles')->where(
                    
                     'tag_1','like','%'.$info.'%'
                 )->get();

        $articles3 = DB::table('articles')->where(
                    
                     'content','like','%'.$info.'%'
                 )->get();

        $articles4 = DB::table('articles')->where(
                    
                     'user_name','like','%'.$info.'%'
                 )->get();

        $uid = session('user_id');
        $data = member::find($uid);
 
        if(count($articles0) == 0 && count($articles1) == 0 && count($articles2) == 0 && count($articles3) == 0 && count($articles4) == 0) {

            return view('Error.searchError');
       }

        return view('Home.searchResults',compact('articles0','articles1','articles2','articles3','articles4','data'));

      

    }

    public function getArticle($id) {
    	$article = article::find($id);
    	//dd($article);
    	$uid = session('user_id');
    	//dd($uid);
    	$user = member::find($uid);
    	//dd($user);
    	return view('Home.blog',compact('article','user'));
    }

    public function profile() {
        $id = session('user_id');
        $user = member::find($id);
        $articles = DB::table('articles')
        ->where('user_id',$id)
        ->latest()
        ->get();
        
        return view('Home.profile',compact('user','articles'));
    }

     public function toUploads($id) {
        $article = article::find($id);
        $uid = session('user_id');
        $user = member::find($uid);
        return view('Home.upBlog',compact('article','user'));
    }
    
    public function Uploads(Requests\articleRequest $request,$id) {
        $destinationPath = 'Uploads/Articles/';
        $user = member::find(session('user_id'));
        
        //dd($user);
        $article = article::find($id);
        $old_path = $article->img_path;
        $article->user_id = $user->id;
        $article->title = $request->get('title');
        $article->intro = $request->get('intro');
        $article->content = $request->get('content');
        $article->tag_1 = $request->get('tag');
        
        //$img = $_FILES["articlePic"];

        
        
        $img = $request->file('articlePic');
        if($img != null) {
            $imgName = $user->name.time().$img->getClientOriginalName(); 
            $img->move($destinationPath,$imgName);
            $article->img_path = '/'.$destinationPath.$imgName;

            $path = new path_to_delete();
            $path->path = $old_path;
            $path->save();
        }
        //dd($imgName);
        
         
        $article->save();

        return redirect('/profile');
    }
}
