<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\Post; 
use Illuminate\Support\Facades\Gate;
use Carbon\Carbon;  
class HomeController extends Controller
{
     
    public function __construct()
    {
        $this->middleware('auth');
    }

     
    public function index(Request $request)
    {    
        //tất cả bài viết của những người bạn theo dõi
        $posts =Post::limit(5)->get(); 
        $now =Carbon::now();
        
            $user =User::where('id','!=',\Auth::id())
            ->orderBy('picture','desc')
            ->limit(5)
            ->get(); 
       
        $data=[
            'now'   => $now,
            'posts' => $posts, 
            'user'  => $user,     
            'title' => 'Instagram'
        ];
        return view('welcome',$data);
    }
     
}
