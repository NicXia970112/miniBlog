<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', ['uses' => 'UserController@toLogin']);//根目录

Route::any('/login', ['uses' => 'UserController@login']);//检查登陆表单

Route::get('/register', ['uses' => 'UserController@toRegister']);//注册界面

Route::any('/captcha/{tmp}', ['uses' => 'UserController@captcha']);//生成验证码图片

Route::post('/checkRegis', ['uses' => 'UserController@checkRegis']);//检查注册信息

Route::any('/home', ['uses' => 'UserController@home']);//博客主页

Route::any('/index', ['uses' => 'UserController@index']);//用户首页

Route::any('/logout', ['uses' => 'UserController@logout']);//登出

Route::get('/regisSuc', ['uses' => 'UserController@showRegis']);//展示注册结果

Route::get('/toEditProfile', ['uses' => 'UserController@toEditProfile']);//前往编辑个人信息

Route::post('/EditProfile', ['uses' => 'UserController@EditProfile']);//编辑个人信息

Route::get('/toEditPsw', ['uses' => 'UserController@toEditPsw']);//前往修改密码

Route::any('/article_collect/{id}', ['uses' => 'UserController@ArticleCollect']);//收藏文章

Route::any('/article_collect_cancel/{id}', ['uses' => 'UserController@ArticleCollect_cancel']);//取消收藏

Route::any('/getCollect', ['uses' => 'UserController@getCollect']);//前往我的收藏界面

Route::get('/toEditArticle', ['uses' => 'ArticleController@toEdit']);//提交文章

Route::post('/editArticle', ['uses' => 'ArticleController@edit']);//编辑文章

Route::post('/search', ['uses' => 'ArticleController@search']);//搜索

Route::get('/article/{id}', ['uses' => 'ArticleController@getArticle']);//查看文章

Route::get('/profile', ['uses' => 'ArticleController@profile']);//个人中心

Route::get('/uploadsArticle/{id}', ['uses' => 'ArticleController@toUploads']);//前往更新文章

Route::post('/uploadsArticle/{id}', ['uses' => 'ArticleController@Uploads']);//更新文章

Route::any('/changePsw', ['uses' => 'MailController@changePsw']);//修改密码

Route::post('/checkChangePsw', ['uses' => 'MailController@checkChangePsw']);

Route::get('/toAuth_email', ['uses' => 'MailController@toAuth_email']);

Route::any('/auth_email', ['uses' => 'MailController@auth_email']);//邮箱认证

Route::post('/checkAuth', ['uses' => 'MailController@checkAuth']);




// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
