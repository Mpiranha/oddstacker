<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\StockCategory;
use App\Models\StockType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use function Psy\debug;

class SettingController extends Controller
{
    public function view()
    {
        $setting = Setting::first();
        $stock_cat = StockCategory::count() > 0;
        return view('admin.settings.view')->with([
            'setting' => $setting,
            'stock_category' => $stock_cat
        ]);
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'site_name' => 'required|max:148',
            'site_description' => 'required|max:2000',
            'site_mail' => 'required',
            'site_phone' => 'required',
            'site_whatsapp' => 'required'
        ]);

        $setting = Setting::first();

        if (!$setting) {
            $setting = new Setting();
        }

        $setting->site_name = $request->get('site_name');
        $setting->site_description = $request->get('site_description');
        $setting->site_mail = $request->get('site_mail');
        $setting->site_phone = $request->get('site_phone');
        $setting->site_whatsapp = $request->get('site_whatsapp');
        $setting->save();

        if (!$request->get('stock_cat_bool')) {
            if (sizeof($request->get('names')) < 3 || sizeof($request->get('odds')) < 3 || sizeof($request->get('matches')) < 3) {
                return \redirect()->back()->withErrors([
                    'error' => 'An error occurred while trying to add stock category please reload and try again.'
                ]);
            }

            $data = array();
            for ($i = 0; $i <= 2; $i++) {
                $data[] = ['name' => $request->get('names')[$i],
                    'odd' => $request->get('odds')[$i],
                    'match' => $request->get('matches')[$i],
                    'tie_breaker' => $request->get('tie_breakers')[$i],
                    'tie_breaker_one' => $request->get('tie_breaker_one')[$i],
                    'tie_breaker_two' => $request->get('tie_breaker_two')[$i],
                ];
            }

            foreach ($data as $cat) {
//                Log::debug($cat);
                StockCategory::create([
                    'name' => $cat['name'],
                    'odd' => $cat['odd'],
                    'boxes' => $cat['match'],
                    'tie_breaker' => $cat['tie_breaker'],
                    'tie_breaker_one' => $cat['tie_breaker_one'],
                    'tie_breaker_two' => $cat['tie_breaker_two'],
                ]);
            }

            $query_stock_type = StockType::count();

            if ($query_stock_type < 3) {
                $types = [
                    ['name' => 'leagues'],
                    ['name' => 'predictions'],
                    ['name' => 'matches'],
                ];

                foreach ($types as $type) {
                    StockType::create([
                        'name' => $type['name']
                    ]);
                }
            }
        }

        return back()->with('success', 'Settings saved!');
    }
}
