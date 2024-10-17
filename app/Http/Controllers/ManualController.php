<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual;

class ManualController extends Controller
{
    public function show($brand_id, $brand_slug, $manual_id )
    {
        $brand = Brand::findOrFail($brand_id);
        $manual = Manual::findOrFail($manual_id);

        return view('pages/manual_view', [
            "manual" => $manual,
            "brand" => $brand,
        ]);
    }

    public function clicksAndRedirect($id){
        $manual = Manual::findOrFail($id);
        $manual->increment('clicks');

    if ($manual->locally_available) {
            return redirect()->away(route('manual.download', $manual->id));
    } else {
        return redirect()->away($manual->originUrl);
    }
}

    public function getTopItems()
    {
        $topItems = Manual::orderBy('clicks', 'desc')
        ->take(5)
        ->pluck('name');


        return view('pages.homepage', compact('topItems'));
    }
}
