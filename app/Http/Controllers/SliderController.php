<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function view(){
        $sliders = Slider::paginate(20);
        return view('admin.sliders.view', [
            'sliders' => $sliders
        ]);
    }
}
