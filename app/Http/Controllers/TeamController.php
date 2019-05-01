<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Helpers\TeamsHelper;
use App\Models\Team;
use App\Models\League;
use App\Models\Sport;
use App\Models\Country;

class TeamController extends Controller
{
    public function addNewTeam(Request $request, $country_id, $sport_id, $league_id){

        $this->validate($request, [
            'name' => 'required|string|min:2',
            'type' => 'required|in:country,club,single',
            'logo' => 'required|url'
        ]);

        $response = TeamsHelper::createTeam([
            'name' => $request->get('name'),
            'type' => $request->get('type'),
            'logo' => $request->get('logo'),
            'league_id' => $league_id,
            'country_id' => $country_id,
            'sport_id' => $sport_id,
        ]);

        if ($response['status'] = false) {
            return \redirect()->back()->withErrors([
                'error' => 'An error occurred while adding team'
            ]);
        }

        return \redirect()->back();
    }

    public function teams()
    {
        $countries = Country::paginate(20);
        return view('admin.teams.show', [
            'countries' => $countries,
        ]);
    }

    public function view($name, $id)
    {
        $name = strtolower($name);
        $country = (new Country())->country_exists($name, $id);
        if (is_null($country)) {
            return back();
        }
        $sports = Sport::paginate(20);
        return view('admin.teams.view', [
            'sports' => $sports,
            'country_name' => $name,
            'country_id' => $id
        ]);
    }

    public function league($country, $country_id, $sport, $sport_id)
    {
        $sport_name = strtolower($sport);
        $sport = (new Sport())->sport_exists($sport_name, $sport_id);
        if (is_null($sport)) {
            return back();
        }
        $leagues = League::where('country_id', $country_id)->where('sport_id', $sport_id)->get();
        return view('admin.teams.league', [
            'leagues' => $leagues,
            'country_name' => $country,
            'country_id' => $country_id,
            'sport_name' => $sport_name,
            'sport_id' => $sport_id,
        ]);
    }

    public function getTeams($country, $country_id, $sport, $sport_id, $league_name, $league_id) {
        $league = (new League())->league_exist($league_name, $league_id);
        if (is_null($league)) {
            return back();
        }
        $teams = Team::where('league_id', $league_id)
        ->where('country_id', $country_id)->where('sport_id', $sport_id)->orderBy('name')->get();
        return view('admin.teams.teams', [
            'teams' => $teams,
            'country_name' => $country,
            'country_id' => $country_id,
            'sport_name' => $sport,
            'sport_id' => $sport_id,
            'league_name' => $league_name,
            'league_id' => $league_id,
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
