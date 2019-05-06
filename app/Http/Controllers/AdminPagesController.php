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

    public function revoke($id, $revoke = false) {
        $role  = $revoke ? 'user' : 'admin';
        try {
            $user = User::findorfail($id);
            $user->update([
                'role' => $role,
            ]);
            return back();
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred');
        }
    }
}
