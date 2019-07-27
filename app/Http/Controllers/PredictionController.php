<?php

namespace App\Http\Controllers;

use App\Models\PredictionGroup;
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
        $predictions = Prediction::with('group')->where('sport_id', $id)->paginate(20);
        $groups = PredictionGroup::all();

        return view('admin.predictions.view', [
            'predictions' => $predictions,
            'sport_name' => $sport->name,
            'sport_id' => $sport->id,
            'groups' => $groups
        ]);
    }

    public function edit($id) {
        try {
            $prediction = Prediction::findorfail($id);
//            $groups = PredictionGroup::all();
            return view('admin.predictions.edit', [
                'prediction' => $prediction,
                'id' => $id,
//                'groups' => $groups
            ]);
        } catch (\Exception $e) {
            return back()->with('error', 'not Found');
        }
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
            'alias' => 'required',
//            'group' => 'required'
        ]);
        try {
            $prediction = Prediction::findorfail($id);
            $prediction->update([
                'name' => $request->name,
                'alias' => $request->alias,
//                'group_id' => $request->group
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
            'group' => 'required'
        ]);
        Prediction::create([
            'name' => $request->name,
            'alias' => $request->alias,
            'sport_id' => $sport_id,
            'group_id' => $request->group
        ]);
        return back()->with('success', 'Added successfully');
    }

    public function prediction_groups(){
        $groups = PredictionGroup::all();
        return view('admin.predictions.groups.show',[
            'groups' => $groups
        ]);
    }

    public function create_prediction_groups(Request $request){
        $this->validate($request, [
            'name' => 'required',
        ]);
        PredictionGroup::create([
            'name' => $request->name
        ]);
        return back()->with('success', 'Added successfully');
    }
}
