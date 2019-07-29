<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\EventPrediction;
use App\Models\StockEvent;
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
        $stocks = Stock::with('category')->get();
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
        $stock = Stock::with('category')->findOrFail($id);
        ##  TODO::PROTECT THIS ROUTE:: SHOW ONLY PUBLISHED STOCKS
        $eventPredictions = StockEvent::where('stock_id', $stock->id)
            ->with('event')->with('prediction')->get();

        foreach ($eventPredictions as $event) {
            $event['odds'] = 0;
        }

        return view('stackshell-db', [
            'stock' => $stock,
            'eventPredictions' => $eventPredictions
        ]);

//        return $eventPredictions;
    }
}
