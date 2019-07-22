<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    public function countries() {
        $countries = Country::paginate(20);
        
        return view('admin.countries', [
            'countries' => $countries,
        ]);
    }

    public function create(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'logo' => 'required',
        ]);

        Country::create([
            'name' => $request->name,
            'logo' => $request->logo,
        ]);
        return back()->with('success', 'Country Added');
    }

    public function delete($id) {
        try {
            (new Country())->findorfail($id)->delete();
            return back()->with('success', 'Country Deleted successflly');
        } catch (\Exception $e) {
            return back()->with('error', 'error must have occurred');
        }
    }
}
