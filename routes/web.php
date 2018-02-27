<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the 'web' middleware group. Now create something great!
|
*/

Route::get('/', 'Dashboard\LoginController@index');

// Dashboard
Route::get('dashboard/login', 'Dashboard\LoginController@index');
Route::get('dashboard/logout', 'Dashboard\LoginController@logout');
Route::post('dashboard/checklogin', 'Dashboard\LoginController@checkLogin');
Route::get('/rebuildcaptcha',function(){
    return captcha_src('flat');
});
Route::namespace('Dashboard')->middleware('dashboardauth')->group(function(){
    Route::get('dashboard/', 'IndexController@index');
    Route::get('dashboard/index', 'IndexController@index');
    
    // 分类管理
    Route::get('dashboard/category', 'CategoryController@index');
    Route::get('dashboard/category/list/depth/{depth}/parentid/{parentid}', 'CategoryController@list');
    Route::post('dashboard/category/add/depth/{depth}/parentid/{parentid}', 'CategoryController@add');
    Route::get('dashboard/category/edit/depth/{depth}/id/{id}', 'CategoryController@edit');
    Route::post('dashboard/category/doedit/depth/{depth}/parentid/{parentid}/id/{id}', 'CategoryController@doedit');
    
    Route::get('dashboard/demo', 'DemoController@index');
    Route::get('dashboard/demo/search', 'DemoController@search');
    Route::get('dashboard/demo/detail/{id}', 'DemoController@detail')->where('id', '[0-9]+');
    Route::post('dashboard/demo/editdetail/{id}', 'DemoController@editdetail')->where('id', '[0-9]+');
    Route::get('dashboard/demo/ajaxgetcategory', 'DemoController@ajaxgetcategory');
    Route::get('dashboard/search', 'SearchController@index');
    Route::get('dashboard/stats', 'StatsController@index');
    Route::get('dashboard/stats/search', 'StatsController@search');
    // SEO管理
    Route::get('dashboard/seo', 'SeoController@index');
    Route::post('dashboard/seo/setup', 'SeoController@setup');
    
    Route::get('dashboard/admin', 'AdminController@index');
    // 用户管理
    Route::get('dashboard/user', 'UserController@index');
    Route::get('dashboard/user/search', 'UserController@search');
    Route::get('dashboard/user/qr', 'UserController@qr');
    Route::get('dashboard/user/qrlist/{user_id}', 'UserController@qrlist')->where('user_id', '[0-9]+');
    Route::get('dashboard/user/applyqr/{user_id}', 'UserController@applyqr')->where('user_id', '[0-9]+');
    Route::get('dashboard/user/deleteqr/{id}', 'UserController@deleteqr')->where('id', '[0-9]+');
    // 抓取管理
    Route::get('dashboard/crawler', 'CrawlerController@index');
    Route::get('dashboard/crawler/{func}', 'CrawlerController@crawl');
    
});

// Captcha
/*
use Illuminate\Support\Facades\Input;
Route::any('captcha-test', function()
{
    if (Request::getMethod() == 'POST')
    {
        $rules = ['captcha' => 'required|captcha'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
        {
            echo '<p style='color: #ff0000;'>Incorrect!</p>';
        }
        else
        {
            echo '<p style='color: #00ff30;'>Matched :)</p>';
        }
    }
    
    $form = '<form method='post' action='captcha-test'>';
    $form .= '<input type='hidden' name='_token' value='' . csrf_token() . ''>';
    $form .= '<p>' . captcha_img() . '</p>';
    $form .= '<p><input type='text' name='captcha'></p>';
    $form .= '<p><button type='submit' name='check'>Check</button></p>';
    $form .= '</form>';
    return $form;
});

*/
