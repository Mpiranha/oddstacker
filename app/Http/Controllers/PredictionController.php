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

    public function view($id) {
        $sport = (new Sport())->sport_exists($id);
        if (is_null($sport)) {
            return back();
        }
        $predictions = Prediction::where('sport_id', $id)->paginate(20);
        return view('admin.predictions.view', [
            'predictions' => $predictions,
            'sport_name' => $sport->name,
            'sport_id' => $sport->id
        ]);
    }

    public function edit($id) {
        try {
            $prediction = Prediction::findorfail($id);
            return view('admin.predictions.edit', [
                'prediction' => $prediction,
                'id' => $id,
            ]);
        } catch (\Exception $e) {
            return back()->with('error', 'not Found');
        }
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
            'alias' => 'required',
        ]);
        try {
            $prediction = Prediction::findorfail($id);
            $prediction->update([
                'name' => $request->name,
                'alias' => $request->alias,
            ]);
            return back()->with('success', 'Updated successfully');
        } catch (\Throwable $th) {
            return back()->with('error', 'error must have occurred');
        }
    }

    public function delete($id) {
        try {
            (new Prediction())->findorfail($id)->delete();
            return back()->with('success', 'League Deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'error must have occurred');
        }
    }

    public function create(Request $request, $sport_id) {
        $sport = (new Sport())->sport_exists($sport_id);
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
