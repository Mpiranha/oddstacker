<?php

namespace App\Http\Helpers;


use App\Models\StockEvent;
use App\Models\StockWinners;

class Stocks
{
    public static function createStockWinners($arr, $stock)
    {
        foreach ($arr as $key => $winner) {
            $position = $key + 1;

            StockWinners::create([
                'position' => $position,
                'amount' => $winner['amount'],
                'stock_id' => $stock->id
            ]);
        }
    }

    public static function addStockEvents($arr, $stock)
    {
        foreach ($arr as $key => $match) {
            StockEvent::create([
                'prediction_id' => $match['prediction_id'],
                'event_id' => $match['event_id'],
                'stock_id' => $stock->id
            ]);
        }
    }
}