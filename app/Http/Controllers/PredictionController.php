<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sport;
use App\Models\Prediction;

class PredictionController extends Controller
{
    public function predictions() {
        $sports = Sport::all();
        return view('admin.predictions.show',[
            'sports' => $sports
        ]);
    }

    public function view($name, $id) {
        $name = strtolower($name);
        $sport = (new Sport())->sport_exists($name, $id);
        if (is_null($sport)) {
            return back();
        }
        $predictions = Prediction::where('sport_id', $id)->get();
        return view('admin.predictions.view', [
            'predictions' => $predictions,
            'sport_name' => $name,
            'sport_id' => $id
        ]);
    }

    public function delete($id) {
        try {
            (new Prediction())->findorfail($id)->delete();
            return back()->with('success', 'League Deleted successflly');
        } catch (\Exception $e) {
            return back()->with('error', 'error must have occurred');
        }
    }

    public function create(Request $request, $sport_name, $sport_id) {
        $sport = (new Sport())->sport_exists($sport_name, $sport_id);
        if (is_null($sport)) {
            return back()->with('error', 'not found');
        }
        $this->validate($request, [
            'name' => 'required',
            'alias' => 'required',
        ]);
        Prediction::create([
            'name' => $request->name,
            'alias' => $request->alias,
            'sport_id' => $sport_id,
        ]);
        return back()->with('success', 'Added successfully');
    }
}
