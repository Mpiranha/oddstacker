<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\EventPrediction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = Stock::with('category')->get();
        return view('home', [
            'stocks' => $stocks,
        ]);
    }

    public function stackShell(Request $request, $id)
    {
        $stock = Stock::with('category')->findOrFail($id);
        ##  TODO::PROTECT THIS ROUTE:: SHOW ONLY PUBLISHED STOCKS
        $eventPredictions = EventPrediction::where('stock_id', $stock->id)
            ->with('event')->with('prediction')->get();

        return view('stackshell-db', [
            'stock' => $stock,
            'eventPredictions' => $eventPredictions
        ]);
    }
}
