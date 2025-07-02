<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    public function dashboard(){
        $users = Users::get();
        return view('dashboard.index',compact('users'));
    }

    public function index() 
    {
        
        // $users = DB::table('users')->get();
        
        // $users = DB::table('users');
        // $users = Users::all();
        $users = Users::paginate(10);
        // $users = Users::simplepaginate(5);

        // $users = DB::table('users')
        //         ->where('id','>',5)
        //         ->simplePaginate(3);

        // $users = DB::table('users')
        //         ->where('id','>=',5)
        //         ->orderBy('id','asc')
        //         ->paginate(5);

        // $users = DB::table('users')
        //         ->where('name','Francis Brown V')
        //         ->where('status',1)->get();

        // $users = DB::table('users')
        //         ->where('name','like','%T%')
        //         ->orderBy('name')
        //         ->paginate(3);

        // $users = DB::table('users')->select('name','id')->where('id',3)->get();

        // $users = DB::table('users')
        //             ->select(DB::raw('count(*) as user_count, status'))
        //             ->where('status','<>',0)
        //             ->groupBy('status')
        //             ->get();


        return view('dashboard.users.index',compact('users'));
    }
}
