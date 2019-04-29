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
        // return $request->all();
        $this->validate($request, [
            'name' => 'required',
            'logo' => 'required',
        ]);

        Country::create([
            'name' => $request->name,
            'logo' => $request->logo,
        ]);
        return back();
    }

    public function delete($id) {
        return $id;
    }
}
