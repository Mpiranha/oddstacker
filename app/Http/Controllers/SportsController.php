<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sport;

class SportsController extends Controller
{
    public function sports() {
        $sports = Sport::paginate(20);
        return view('admin.sports', [
            'sports' => $sports,
        ]);
    }

    public function create(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'logo' => 'required',
        ]);

        Sport::create([
            'name' => $request->name,
            'image' => $request->logo,
        ]);
        return back()->with('success', 'Sport Added Successfully');
    }

    public function delete($id) {
        try {
            (new Sport())->findorfail($id)->delete();
            return back()->with('success', ' Sport successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'error must have occurred');
        }
    }
}
