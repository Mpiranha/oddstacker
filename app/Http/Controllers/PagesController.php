<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
class PagesController extends Controller
{
    public function teams(){
        $teams = Team::all();
        return view('admin.teams');
    }
}
