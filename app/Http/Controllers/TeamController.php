<?php

namespace App\Http\Controllers;

use App\Models\TeamsLeague;
use Illuminate\Http\Request;
use App\Http\Helpers\TeamsHelper;
use App\Models\Team;
use App\Models\League;
use App\Models\Sport;

class TeamController extends Controller
{
    public function addNewTeam(Request $request, $sport_id)
    {
        $this->validate($request, [
            'name' => 'required|string|min:2',
            'type' => 'required|in:country,club',
            'logo' => 'required|url:max:1000'
        ]);

        $response = TeamsHelper::createTeam([
            'name' => $request->get('name'),
            'type' => $request->get('type'),
            'logo' => $request->get('logo'),
            'sport_id' => $sport_id,
        ]);

        if ($response['status'] = false) {
            return \redirect()->back()->withErrors([
                'error' => 'An error occurred while adding team'
            ]);
        }

        return \redirect()->back()->with('success', 'successfully added');
    }

    public function teams()
    {
        $sports = Sport::paginate(20);
        return view('admin.teams.show', [
            'sports' => $sports,
        ]);
    }

    public function view($id)
    {
        $sport = (new Sport())->sport_exists($id);
        if (is_null($sport)) {
            return back();
        }
        $leagues = League::where('sport_id', $sport->id)->get();
        $teams = Team::where('sport_id', $sport->id)->with('leagues')->get();

        return view('admin.teams.view', [
            'teams' => $teams,
            'sport' => $sport,
            'leagues' => $leagues
        ]);
    }

    public function addLeague(Request $request)
    {
        $league = TeamsLeague::where('team_id', $request->get('team_id'))->where('league_id', $request->get('league_id'))->first();
        if ($league) return response()->json([
            'status' => false,
            'message' => 'already Added',
        ]);

        $team = Team::findOrFail($request->get('team_id'));

        $team->leagues()->attach($request->get('league_id'));

        return response()->json([
            'status' => true,
            'message' => 'Added successfully',
        ]);
    }

    public function deleteLeague(Request $request)
    {
        $league = TeamsLeague::where('team_id', $request->get('team_id'))->where('league_id', $request->get('league_id'))->first();
        if (!$league) return response()->json([
            'status' => false,
            'message' => 'An Error must have occurred. please try again',
        ]);

        $team = Team::findOrFail($request->get('team_id'));

        $team->leagues()->detach($request->get('league_id'));
        return response()->json([
            'status' => true,
            'message' => 'Deleted successfully',
        ]);

    }

    public function delete($id)
    {
        try {
            $team = Team::findorfail($id);
            $team->leagues()->detach();
            $team->delete();

            return response()->json([
                'status' => true,
                'message' => 'Deleted successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'An unexpected error occurred.',
            ]);
        }
    }
}
