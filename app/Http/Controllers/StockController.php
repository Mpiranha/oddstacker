<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Stocks;
use App\Models\Stock;
use App\Models\StockEntry;
use App\Models\StockEntrySelection;
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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
            $stock->is_duplicating = $request->get('duplicate');
            $stock->n_duplicates = $request->get('duplicate_times');
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


    public function todayStocks()
    {
        $stocks = Stock::all();

        return response()->json($stocks);
    }

    public function stockLobby(Request $request)
    {
        if($request->get('selection')){
            $selections = $request->get('selection');

            //check if stock is still available
            $stock = Stock::where('id', $selections[0]['stock_id'])->where('status', 0);
            $stock_check = $stock->count();
            $stock = $stock->lockForUpdate()->first();

            if($stock_check){
                $entries = StockEntry::where('stock_id', $stock->id)->count();

                if($stock->entry == $entries){
                    return response()->json([
                        'errors' => ['all' => 'This stock cannot hold anymore entry.']
                    ], 401);
                }

                $entry = StockEntry::create(['stock_id' => $selections[0]['stock_id'], 'user_id' => Auth::id()]);

//                $stock->entry += 1;
//                $stock->save();

                if($stock->entry == ($entries+1)){
                    $stock->full_entry = true;
                    $stock->save();

                    if($stock->is_duplicating && $stock->n_duplicates > $stock->count_duplicate){
                        Stocks::newStock($stock, ($stock->count_duplicate + 1));
                        $stock->count_duplicate += 1;
                        $stock->save();
                    } elseif(!$stock->is_duplicating && $stock->is_photocopy){
                        $main_stock = Stock::where('code', $stock->code)->where('is_duplicating', true)->first();
                        $child_stock = Stocks::newStock($main_stock, ($stock->count_duplicate + 1));

                        $main_stock->count_duplicate += 1;
                        $main_stock->save();

                        $check_entries = StockEntry::where('stock_id', $child_stock->id)->count();

                        if($child_stock->entry == $check_entries){
                            $child_stock->full_entry = true;
                            $child_stock->save();

                            if($main_stock->n_duplicates == $main_stock->count_duplicate){
                                $main_stock->is_duplicating = false;
                                $main_stock->n_duplicates = 0;
                                $main_stock->count_duplicate = 0;
                                $main_stock->save();
                            }
                        }
                    }
                }

                foreach ($selections as $selection){
                    StockEntrySelection::create([
                        'stock_id' => $selections[0]['stock_id'],
                        'entry_id' => $entry->id,
                        'stock_event_id' => $selection['event_id'],
                        'odd' => $selection['odds'],
                        'tie_breaker' => $selection['tie_breaker']
                    ]);
                }

                return response()->json([

                ], 201);

            }

            return response()->json([
                'errors' => ['all' => 'Stock is already active.']
            ], 401);

        }

        return response()->json([
            'errors' => ['all' => 'Request could not be processed at this time. Please reload and try again.']
        ], 401);
    }
}
