<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\League;
use App\Models\Sport;

class LeagueController extends Controller
{
    public function league() {
        $sports = Sport::paginate(20);
        return view('admin.leagues.show',[
            'sports' => $sports,
        ]);
    }

    public function sport($sport_id) {
        $sport = (new Sport())->sport_exists($sport_id);
        if (is_null($sport)) {
            return back();
        }
        $leagues = League::where('sport_id', $sport_id)->get();
        return view('admin.leagues.league', [
            'leagues' => $leagues,
            'sport_name' => $sport->name,
            'sport_id' => $sport->id,
        ]);
    }

    public function create(Request $request, $sport_id) {
        $this->validate($request, [
            'name' => 'required',
            'logo' => 'required|max:1000'
        ]);

        League::create([
            'name' => $request->name,
            'logo' => $request->logo,
            'sport_id' => $sport_id,
        ]);
        return back()->with('success', 'successfully added');
    }

    public function delete($id) {
        try {
            (new League())->findorfail($id)->delete();
            return back()->with('success', 'League Deleted successflly');
        } catch (\Exception $e) {
            return back()->with('error', 'error must have occurred');
        }
    }
}
