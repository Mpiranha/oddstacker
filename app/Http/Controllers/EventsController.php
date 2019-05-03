<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Sport;
use App\Models\League;
use App\Models\Competition;
use App\Models\Team;
use App\Models\Event;
use Validator;

class EventsController extends Controller
{
    public function index () {
      return view('admin.events.index');
    }

    public function view() {
      $countries = Country::paginate(20);
      return view('admin.events.view', [
        'countries' => $countries,
      ]);
    }

    public function sport($name, $id) {
      $name = strtolower($name);
        $country = (new Country())->country_exists($name, $id);
        if (is_null($country)) {
            return back();
        }
        $sports = Sport::paginate(20);
        return view('admin.events.sport', [
            'sports' => $sports,
            'country_name' => $name,
            'country_id' => $id
        ]);
    }

    public function league($country, $country_id, $sport, $sport_id) {
      $sport_name = strtolower($sport);
        $sport = (new Sport())->sport_exists($sport_name, $sport_id);
        if (is_null($sport)) {
            return back();
        }
        $compt = Competition::where('country_id', $country_id)->where('sport_id', $sport_id)->get();
        return view('admin.events.compt', [
            'competition' => $compt,
            'country_name' => $country,
            'country_id' => $country_id,
            'sport_name' => $sport_name,
            'sport_id' => $sport_id,
        ]);
    }

    public function createView($id) {
      try {
        $compt = Competition::findorfail($id);
        $countries = Country::all();
        $events = Event::where('competition_id',$id)->orderBy('created_at', 'desc')->get();
        $leagues = League::where('sport_id', $compt->sport_id)->get();

        return view('admin.events.create-view',[
          'competition' => $compt,
          'countries' => $countries,
          'leagues' => $leagues,
          'events' => $events
        ]);
      } catch (\Exception $e) {
        return back()->with('error', $e);
      }
    }

    public function getTeams($country_id, $league_id) {
      $teams = Team::where('country_id', $country_id)->where('league_id', $league_id)->get();
      return response()->json([
        'teams' => $teams
      ]);
    }

    public function createEvent(Request $request) {
      $validator = Validator::make($request->all(), [
          'teamB_id' => 'required',
          'teamA_id' => 'required',
          'competition_id' => 'required',
      ]);

      if ($validator->fails()) {
          return response()->json([
              'status' => false,
              'errors' => $validator->errors()
          ]);
      }
      Event::create([
        'teamA_id' => $request->teamA_id,
        'teamB_id' => $request->teamB_id,
        'competition_id' => $request->competition_id
      ]);

      return response()->json([
        'status' => true,
        'message' => 'created Successfully',
      ]);
    }
}
