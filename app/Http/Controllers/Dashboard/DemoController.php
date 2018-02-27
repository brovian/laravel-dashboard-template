<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DemoController extends Controller
{
    /**
     * 首页
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(Request $request){
        // 移除从detail返回到列表页的returnurl
        $request->session()->forget('from');
        $list = [
            [
                'id'=>'1',
                'name'=>'User1',
                'favs'=>'10',
                'title'=>'Foo Title',
                'created_at'=>'2035-1-1 0:00:00',
                'source'=>'User1',
                'status'=>'1',
                'hidden'=>'0'
            ],
            [
                'id'=>'2',
                'name'=>'User2',
                'favs'=>'20',
                'title'=>'Bar Title',
                'created_at'=>'2035-1-2 0:00:00',
                'source'=>'User2',
                'status'=>'1',
                'hidden'=>'0'
            ],
        ];
        return view('dashboard/demo/demo',[
            'list'=>$list,
            'count'=>20,
            'keyword'=>''
        ]);
    }
    
    /**
     * 搜索标题、内容、提交者
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function search(Request $request){
        // 移除从detail返回到列表页的returnurl
        $request->session()->forget('from');
        $list = [
            [
                'id'=>'1',
                'name'=>'User1',
                'favs'=>'10',
                'title'=>'Foo Title',
                'created_at'=>'2035-1-1 0:00:00',
                'source'=>'User1',
                'status'=>'1',
                'hidden'=>'0'
            ],
            [
                'id'=>'2',
                'name'=>'User2',
                'favs'=>'20',
                'title'=>'Bar Title',
                'created_at'=>'2035-1-2 0:00:00',
                'source'=>'User2',
                'status'=>'1',
                'hidden'=>'0'
            ],
        ];
        return view('dashboard/demo/demo',[
            'list'=>$list,
            'count'=>20,
            'keyword'=>$request->keyword
        ]);
    }
    
    /**
     * 详情页
     * @param Request $request
     * @param int $id demo id
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function detail(Request $request, int $id){
        if($request->get('from')!=''){
            $request->session()->put('from', $request->get('from'));
        }
        $demo = [
            'id'=>'1',
            'title'=>'Foo Title',
            'keyword'=>'Foo,Title',
            'privacy'=>'0',
            'created_at'=>'2035-1-1 0:00:00',
            'source'=>'User1',
            'status'=>'1',
            'hidden'=>'1',
            'content'=>'something in content'
        ];
        $user = ['name'=>'User1'];
        $level0 = [];
        return view('dashboard/demo/detail',[
            'demo'=>$demo,
            'user'=>$user,
            'level0'=>$level0,
        ]);
    }
    
    /**
     * ajax获取分类
     * @param Request $request
     * @return string
     */
    public function ajaxgetcategory(Request $request){
        return json_encode(['level1'=>'','level2'=>'']);
    }
    
    /**
     * 
     * @param Request $request
     * @param int $id
     */
    public function editdetail(Request $request, int $id){
        /**
         *  请自行添加保存代码，此处仅演示
         *  Please write your own code, here is only a demo
         **/
        $request->session()->flash('msg', '修改成功！');
        return redirect('dashboard/demo/detail/'.$id);
    }
}
