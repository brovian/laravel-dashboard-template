<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * 首页
     */
    public function index(Request $request){
        return $this->list($request, 0, 0);
    }
    
    /**
     * 列出分类
     * @param Request $request
     * @param int $depth
     * @param int $parentid
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function list(Request $request, int $depth, int $parentid){
        $result = [
            [
                'id'=>1,
                'name'=>'分类一',
                'uri'=>'category1',
                'order'=>'0',
                'status'=>'1',
                'parent_id'=>'0',
                'depth'=>'0'
            ],
            [
                'id'=>2,
                'name'=>'分类二',
                'uri'=>'category2',
                'order'=>'1',
                'status'=>'1',
                'parent_id'=>'0',
                'depth'=>'0'
            ]
        ];
        return view('dashboard/category/listlevel'.$depth,[
            'category'=>$result,
            'depth'=>0,
            'parentid'=>0,
            'redirectid'=>isset($redirectid) ? $redirectid : [],
            'parentcategory'=>isset($parentcategory) ? $parentcategory : []
        ]);
    }
    
    /**
     * 增加分类
     * @param Request $request
     * @param int $depth
     * @param int $parentid
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function add(Request $request, int $depth, int $parentid){
        /**
         *  请自行添加保存代码，此处仅演示
         *  Please write your own code, here is only a demo
         **/        
        $request->session()->flash(
            'msg', '添加成功！'
        );
        return redirect('dashboard/category/list/depth/'.$depth.'/parentid/'.$parentid);
    }
    
    /**
     * 编辑分类
     * @param Request $request
     * @param int $depth
     * @param int $id
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(Request $request, int $depth, int $id){
        /**
         *  请自行添加保存代码，此处仅演示
         *  Please write your own code, here is only a demo
         **/
        return redirect('dashboard/category');
    }
    
    /**
     * 执行编辑分类
     * @param Request $request
     * @param int $id
     */
    public function doedit(Request $request, int $depth, int $parentid, int $id){
        /**
         *  请自行添加保存代码，此处仅演示
         *  Please write your own code, here is only a demo
         **/
        return redirect('dashboard/category');
    }
}
