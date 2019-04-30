<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminPagesController extends Controller
{
    public function users(){
        $users = User::paginate(20);
        return view('admin.users', [
            'users' => $users
        ]);
    }

}
