<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\EventPrediction;
use App\Models\StockEntry;
use App\Models\StockEvent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = Stock::with('category')->where('schedule_date', '<=', Carbon::now())
            ->where('status', 0)->where('full_entry', false)->get();

        return view('home', [
            'stocks' => $stocks,
        ]);
    }

    public function changePassword(Request $request, $id)
    {
        $authId = Auth::id();
        if ($authId == $id) {
            $this->validate($request, [
                'old_pass' => 'required|string',
                'password' => 'required|string|min:8|confirmed',
            ]);
            $user = User::find($id);
            $old_pass = $request->old_pass;
            $new_pass = $request->password;

            $hashPassword = $user->password;
            if (password_verify($old_pass, $hashPassword)) {
                $user->password = Hash::make($new_pass);
                $user->save();
                return redirect()->back()->with('success', 'Password updated successfully');
            } else {
                return redirect()->back()->with('error', 'Invalid credentials');
            }
        } else {
            return redirect()->back()->with('error', 'You are kinda not allowed');
        }
    }

    public function stackShell(Request $request, $id)
    {
        $stock = Stock::with('category')->where('id', $id)
            ->where('schedule_date', '<=', Carbon::now())
            ->where('status', 0)->where('full_entry', false)->first();

        if ($stock) {
            $eventPredictions = StockEvent::where('stock_id', $stock->id)
                ->with('event')->with('prediction')->get();

            foreach ($eventPredictions as $event) {
                $event['odds'] = 0;
                $event['tie_breaker'] = false;
            }

            //check if current user has enrolled for this stock else take to stock shell

            $entry = StockEntry::where('stock_id', $id)->where('user_id', Auth::user()->id);

            if ($entry->count()) {
                return view('stock/stock-details', [
                    'stock' => $stock,
                    'eventPredictions' => $eventPredictions,
                    'entry' => $entry
                ]);
            }

            return view('stock/stackshell-db', [
                'stock' => $stock,
                'eventPredictions' => $eventPredictions
            ]);
        }

        return abort(404);
    }
}
