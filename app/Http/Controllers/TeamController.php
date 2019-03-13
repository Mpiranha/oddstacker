<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Helpers\TeamsHelper;

class TeamController extends Controller
{
    public function addNewTeam(Request $request){
        $this->validate($request, [
            'name' => 'required|string|min:2',
            'type' => 'required|in:country,club,single',
            'logo' => 'required|url'
        ]);

        $response = TeamsHelper::createTeam([
            'name' => $request->get('name'),
            'type' => $request->get('type'),
            'logo' => $request->get('logo')
        ]);

        if ($response['status'] = false) {
            return \redirect()->back()->withErrors([
                'error' => 'An error occurred while adding team'
            ]);
        }

        return \redirect()->back();
    }
}
