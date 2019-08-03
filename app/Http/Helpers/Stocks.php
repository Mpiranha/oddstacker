<?php

namespace App\Http\Helpers;


use App\Models\Stock;
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

    static function newStock(Stock $stock_ins, $copy_id=null){
        $stock = new Stock();
        $stock->amount = $stock_ins->amount;
        $stock->value = $stock_ins->value;
        $stock->commission = $stock_ins->commission;
        $stock->stake = $stock_ins->stake;
        $stock->entry = $stock_ins->entry;
        $stock->code = $stock_ins->code;
        $stock->schedule_date = $stock_ins->schedule_time;
        $stock->start_time = $stock_ins->start_time;
        $stock->stock_type =$stock_ins->stock_type;
        $stock->stock_type_txt = $stock_ins->stock_type_txt;
        $stock->sport_id = $stock_ins->sport_id;
//        $stock->is_duplicating = $stock_ins->is_duplicating;
//        $stock->n_duplicates = $stock_ins->n_duplicates;
        $stock->category_id = $stock_ins->category_id;
        $stock->no_winners = $stock_ins->no_winners;
        $stock->bonus = $stock_ins->bonus;
        $stock->copy_id = $copy_id;
        $stock->save();

        Stocks::createStockWinners($stock_ins->margin, $stock);
        Stocks::addStockEvents($stock_ins->events, $stock);

        return $stock;
    }
}