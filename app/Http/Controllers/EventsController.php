<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Sport;
use App\Models\League;

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
        $leagues = League::where('country_id', $country_id)->where('sport_id', $sport_id)->get();
        return view('admin.events.league', [
            'leagues' => $leagues,
            'country_name' => $country,
            'country_id' => $country_id,
            'sport_name' => $sport_name,
            'sport_id' => $sport_id,
        ]);
    }
}
