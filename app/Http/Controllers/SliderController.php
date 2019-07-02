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

    public function save(Request $request){
        $this->validate($request, [
            'image' => 'required'
        ]);

        Slider::create([
            'image' => $request->image,
        ]);
        return back()->with('success', 'Slider image added successfully.');
    }

    public function delete(Request $request, $slider_id){
        try {
            (new Slider())->findorfail($slider_id)->delete();
            return back()->with('success', 'Image Deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'error must have occurred');
        }
    }
}
