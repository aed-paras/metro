<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\User;

class UserController extends Controller{

    public function index(){
        $users = User::paginate(30);
        return view('admin.user', ['users'=>$users]);
    }

}
