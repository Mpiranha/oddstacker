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
        $sport = Sport::where('name',$name)->where('id', $id)->first();
        if (is_null($sport)) {
            return back();
        }
        $predictions = Prediction::where('sport_id', $id)->get();
        return view('admin.predictions.view', [
            'predictions' => $predictions,
            'sport_name' => $name,
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

    public function create(Request $request) {
        return $request->all();
    }
}
