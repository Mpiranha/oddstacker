<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockCategory;
use App\Models\StockType;

class StockController extends Controller
{
    public function index() {
        return view('admin.stock.index');
    }

    public function category() {
        $stockCategories = StockCategory::all();
        return view('admin.stock.category',[
           'stockCategories' => $stockCategories,
       ]);
    }

    public function categoryEdit($id) {
        $stockCategory = StockCategory::findorfail($id);
        return view('admin.stock.categoryUpdate', [
            'stockCategory' => $stockCategory
        ]);
    }

    public function categoryUpdate(Request $request, $id) {
        $this->validate($request, [
            'odd' => 'required|numeric',
            'boxes' => 'required|numeric',
        ]);
        $sc = StockCategory::findorfail($id);
        $sc->update([
            'odd' => $request->odd,
            'boxes' => $request->boxes,
        ]);
        return back()->with('success', 'updated');
    }

    public function type() {
        $types = StockType::all();
        return view('admin.stock.type', [
            'types' => $types,
        ]);
    }
}
