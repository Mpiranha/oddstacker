<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Stocks;
use App\Models\Stock;
use App\Models\StockWinners;
use App\Models\StockEvent;
use Illuminate\Http\Request;
use App\Models\StockCategory;
use App\Models\StockType;
use App\Models\Sport;
use App\Models\League;
use App\Models\Competition;
use App\Models\Event;
use Illuminate\Support\Carbon;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::paginate(10);

        return view('admin.stock.index', [
            'stocks' => $stocks
        ]);
    }

    public function category()
    {
        $stockCategories = StockCategory::all();
        return view('admin.stock.category', [
            'stockCategories' => $stockCategories,
        ]);
    }

    public function categoryEdit($id)
    {
        $stockCategory = StockCategory::findorfail($id);
        return view('admin.stock.categoryUpdate', [
            'stockCategory' => $stockCategory
        ]);
    }

    public function categoryUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'odd' => 'required|numeric',
            'boxes' => 'required|numeric',
            'tie_breaker' => 'required|numeric',
            'tie_breaker_one' => 'required|numeric',
            'tie_breaker_two' => 'required|numeric'
        ]);
        $sc = StockCategory::findorfail($id);
        $sc->update([
            'odd' => $request->odd,
            'boxes' => $request->boxes,
            'tie_breaker' => $request->tie_breaker,
            'tie_breaker_one' => $request->tie_breaker_one,
            'tie_breaker_two' => $request->tie_breaker_two
        ]);
        return back()->with('success', 'updated');
    }

    public function type()
    {
        $types = StockType::all();
        return view('admin.stock.type', [
            'types' => $types,
        ]);
    }

    public function createView()
    {
        $stockCategories = StockCategory::all();
        $types = StockType::all();
        $sports = Sport::all();
        return view('admin.stock.create', [
            'stockCategories' => $stockCategories,
            'types' => $types,
            'sports' => $sports,
        ]);
    }

    public function league($sport_id)
    {
        $leagues = League::where('sport_id', $sport_id)->get();
        return $leagues;
    }

    public function events($sport_id)
    {
        $now = (new Carbon())->now()->toDateString();
        $events = Event::with('predictions')->with('league')->where('sport_id', $sport_id)->whereDate('event_schedule', '>', $now)->orderBy('event_schedule', 'desc')->get();
        return $events;
    }

    public function saveStock(Request $request)
    {
        $this->validate($request, [
            'stock_type' => 'required'
        ]);

        $stock_category = StockCategory::where('id', $request->get('category'))->first();

        if ($stock_category->boxes == sizeof($request->get('matches'))) {
            $stock_group = StockType::where('name', $request->get('stock_group'))->first();
            $stock_token = str_random(7);
            $is_bonus = $request->get('available_for_promo');
            $matches = $request->get('matches');
            $winners = $request->get('price');

            $stock = new Stock();
            $stock->amount = $request->get('amount');
            $stock->value = $request->get('value');
            $stock->commission = $request->get('commission');
            $stock->stake = $request->get('stake');
            $stock->entry = $request->get('entry');
            $stock->code = $stock_token;
//            $stock->schedule_date = $schedule_time;
            $stock->start_time = $matches[0]['event_schedule'];
            $stock->stock_type = $stock_group->id;
            $stock->stock_type_txt = $request->get('stock_type');
            $stock->sport_id = $request->get('sport_id');
            $stock->duplicate = $request->get('duplicate');
            $stock->category_id = $stock_category->id;
            $stock->no_winners = $request->get('no_winners');
            $stock->bonus = $is_bonus;
            $stock->save();

            $this->createStockWinners($winners, $stock);
            $this->addStockEvents($matches, $stock);

            return response()->json([], 201);
        }

        return response()->json([
            'errors' => ['all' => 'Request could not be processed at this time. Please reload and try again.']
        ], 401);
    }

    public function createStock(Request $request)
    {
        $this->validate($request, [
            'stock_type' => 'required'
        ]);

        $stock_category = StockCategory::where('id', $request->get('category'))->first();

        if ($stock_category->boxes == sizeof($request->get('matches'))) {
            $schedule_time = ($request->get('schedule_time')) ? date('Y-m-d H:i:s ', strtotime($request->get('schedule_time'))) : Carbon::now();
            $stock_group = StockType::where('name', $request->get('stock_group'))->first();
            $stock_token = str_random(7);
            $is_bonus = $request->get('available_for_promo');
            $matches = $request->get('matches');
            $winners = $request->get('price');

            $stock = new Stock();
            $stock->amount = $request->get('amount');
            $stock->value = $request->get('value');
            $stock->commission = $request->get('commission');
            $stock->stake = $request->get('stake');
            $stock->entry = $request->get('entry');
            $stock->code = $stock_token;
            $stock->schedule_date = $schedule_time;
            $stock->start_time = $matches[0]['event_schedule'];
            $stock->stock_type = $stock_group->id;
            $stock->stock_type_txt = $request->get('stock_type');
            $stock->sport_id = $request->get('sport_id');
            $stock->duplicate = $request->get('duplicate');
            $stock->category_id = $stock_category->id;
            $stock->no_winners = $request->get('no_winners');
            $stock->bonus = $is_bonus;
            $stock->save();

            Stocks::createStockWinners($winners, $stock);
            Stocks::addStockEvents($matches, $stock);

            return response()->json([], 201);
        }

        return response()->json([
            'errors' => ['all' => 'Request could not be processed at this time. Please reload and try again.']
        ], 401);
    }



    public function todayStocks(){
        $stocks = Stock::all();

        return response()->json($stocks);
    }
}
