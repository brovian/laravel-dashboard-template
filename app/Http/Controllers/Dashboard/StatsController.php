<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatsController extends Controller
{
    public function index(){
        return view('dashboard/stats');
    }
    
    public function search(Request $request){
        echo $request->input('uri');
    }
}
