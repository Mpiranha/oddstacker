<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sport;

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
        // return ([$name, $id]);
        return view('admin.predictions.view', [

        ]);
    }
}
