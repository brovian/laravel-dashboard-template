<?php

namespace App\Http\Controllers\Dashboard;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 登录页
 * @author vian
 *
 */
class LoginController extends Controller
{
    /**
     * 登录首页
     */
    public function index(){
        echo view('dashboard/login');
    }
    
    /**
     * 核实登录表单
     * @param Request $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function checkLogin(Request $request){
        if ($_POST){
            $validator = Validator::make($request->all(), [
                'captcha' => 'bail|required|captcha',
                'username'=>'bail|required|in:admin',
                'password'=>'bail|required|in:12345678',
            ],[
                'captcha.required'=>'Please input captcha',
                'username.required'=>'Please input username',
                'password.required'=>'Please input password',
                'captcha.captcha'=>'Please input the right captcha',
                'username.in'=>'Please input the right username and password',
                'password.in'=>'Please input the right username and password',
            ]);
            
            if ($validator->fails()) {
                return redirect('dashboard/login')->withErrors($validator)->withInput();
            } else {
                $request->session()->put('admin', 'Admin');
                return redirect('dashboard/index');
            }
        }
    }
    
    /**
     * 退出登录
     * @param Request $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request){
        $request->session()->forget('admin');
        return redirect('dashboard/login');
    }
    
}
