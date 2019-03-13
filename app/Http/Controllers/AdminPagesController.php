<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Team;

class AdminPagesController extends Controller
{
    public function users(){
        $users = User::paginate(20);
        return view('admin.users', [
            'users' => $users
        ]);
    }

    public function teams(){
        $teams = Team::paginate(20);
        return view('admin.teams', [
            'teams' => $teams
        ]);
    }
}
