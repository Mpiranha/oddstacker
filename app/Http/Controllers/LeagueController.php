<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\League;
use App\Models\Sport;

class LeagueController extends Controller
{
    public function league() {
        $countries = Country::paginate(20);
        return view('admin.leagues.show',[
            'countries' => $countries,
        ]);
    }

    public function sport($country, $country_id, $sport, $sport_id) {
        $sport_name = strtolower($sport);
        $sport = (new Sport())->sport_exists($sport_name, $sport_id);
        if (is_null($sport)) {
            return back();
        }
        $leagues = League::where('country_id', $country_id)->where('sport_id', $sport_id)->get();
        return view('admin.leagues.league', [
            'leagues' => $leagues,
            'country_name' => $country,
            'country_id' => $country_id,
            'sport_name' => $sport_name,
            'sport_id' => $sport_id,
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
        return view('admin.leagues.view', [
            'sports' => $sports,
            'country_name' => $name,
            'country_id' => $id
        ]);
    }

    public function create(Request $request, $country_id, $sport_id) {
        $this->validate($request, [
            'name' => 'required',
            'logo' => 'required'
        ]);

        League::create([
            'name' => $request->name,
            'logo' => $request->logo,
            'country_id' => $country_id,
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
