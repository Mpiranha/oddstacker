<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Sport;
use App\Models\Competition;

class CompetitionsController extends Controller
{
    public function index () {
        $sports = Sport::paginate(20);
        return view('admin.competition.index', [
            'sports' => $sports,
        ]);
    }
    
    public function view($sport_id) {
        $countries = Country::paginate(20);
        return view('admin.competition.view', [
            'countries' => $countries,
            'sport_id' => $sport_id,
        ]);
    }

    public function show($country_name, $country_id, $sport_id) {
        $compt = Competition::where('sport_id', $sport_id)->where('country_id', $country_id)->get();
        return view('admin.competition.show',[
            'competitions' => $compt,
            'country_id' => $country_id,
            'sport_id' => $sport_id,
        ]);
    }

    public function create(Request $request, $country_id, $sport_id) {
        $this->validate($request, [
            'name' => 'required',
        ]);
        Competition::create([
            'name' => $request->name,
            'country_id' => $country_id,
            'sport_id' => $sport_id
        ]);
        return back()->with('success', 'added successfully');
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

    public function delete($id){
        try {
            (new Competition())->findorfail($id)->delete();
            return back()->with('success', ' Deleted successflly');
        } catch (\Exception $e) {
            return back()->with('error', 'error must have occurred');
        }
    }
}
