<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockCategory;
use App\Models\StockType;
use App\Models\Sport;
use App\Models\Country;
use App\Models\League;
use App\Models\Competition;
use App\Models\Event;
use Illuminate\Support\Carbon;

class StockController extends Controller
{
    public function index() {
        return view('admin.stock.index');
    }

    public function category() {
        $stockCategories = StockCategory::all();
        return view('admin.stock.category',[
           'stockCategories' => $stockCategories,
       ]);
    }

    public function categoryEdit($id) {
        $stockCategory = StockCategory::findorfail($id);
        return view('admin.stock.categoryUpdate', [
            'stockCategory' => $stockCategory
        ]);
    }

    public function categoryUpdate(Request $request, $id) {
        $this->validate($request, [
            'odd' => 'required|numeric',
            'boxes' => 'required|numeric',
        ]);
        $sc = StockCategory::findorfail($id);
        $sc->update([
            'odd' => $request->odd,
            'boxes' => $request->boxes,
        ]);
        return back()->with('success', 'updated');
    }

    public function type() {
        $types = StockType::all();
        return view('admin.stock.type', [
            'types' => $types,
        ]);
    }

    public function createView() {
        $stockCategories = StockCategory::all();
        $types = StockType::all();
        $sports = Sport::all();
        $countries = Country::all();
        return view('admin.stock.create', [
            'stockCategories' => $stockCategories,
            'types' => $types,
            'sports' => $sports,
            'countries' => $countries
        ]);
    }

    public function competition($country_id, $sport_id) {
        $competitions = Competition::where('country_id', $country_id)->where('sport_id', $sport_id)->get();
        return $competitions;
    }

    public function events($competition_id) {
        $now = (new Carbon())->now()->toDateString();
      $events = Event::where('competition_id', $competition_id)->whereDate('event_schedule', '>', $now)->get();
      return $events;
    }
}
