<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Helpers\TeamsHelper;
use App\Models\Team;
use App\Models\League;

class TeamController extends Controller
{
    public function addNewTeam(Request $request){
        // return $request->all();
        $this->validate($request, [
            'name' => 'required|string|min:2',
            'type' => 'required|in:country,club,single',
            'logo' => 'required|url'
        ]);
        $league_id = $request->league;

        $data = $this->getCountryAndSport($league_id);

        $response = TeamsHelper::createTeam([
            'name' => $request->get('name'),
            'type' => $request->get('type'),
            'logo' => $request->get('logo'),
            'league_id' => $data[ 'league_id'],
            'country_id' => $data[ 'country_id'],
            'sport_id' => $data['sport_id'],
        ]);

        if ($response['status'] = false) {
            return \redirect()->back()->withErrors([
                'error' => 'An error occurred while adding team'
            ]);
        }

        return \redirect()->back();
    }

    private function getCountryAndSport($league_id) {
        $league = League::findorfail($league_id);
        $result = [
            'league_id' => $league->id,
            'country_id' => $league->country_id,
            'sport_id' => $league->sport_id,
        ];
        return $result;
    }

    public function teams()
    {
        $leagues = League::all();
        $teams = Team::paginate(20);
        return view('admin.teams', [
            'teams' => $teams,
            'leagues' => $leagues
        ]);
    }

    public function delete($id) {
        try {
            (new Team())-> findorfail($id)->delete();
            return back()->with('success', ' Team deleted successflly');
        } catch (\Exception $e) {
            return back()->with('error', 'error must have occurred');
        }
    }

}
