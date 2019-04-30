<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\League;
use App\Models\Sport;

class LeagueController extends Controller
{
    public function league() {
        $countries = Country::all();
        $sports = Sport::all();
        $leagues = League::paginate(20);
        return view('admin.leagues',[
            'countries' => $countries,
            'leagues' => $leagues,
            'sports' => $sports,
        ]);
    }

    public function create(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'logo' => 'required',
            'country' => 'required',
            'sport' => 'required',
        ]);

        League::create([
            'name' => $request->name,
            'logo' => $request->logo,
            'country_id' => $request->country,
            'sport_id' => $request->sport,
        ]);
        return back()->with('success', 'successfully added');
    }

    public function delete($id) {
        (new League())->find($id)->delete();
        return back()->with('success', 'League Deleted successflly');
    }
}
