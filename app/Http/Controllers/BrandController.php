<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual;

class BrandController extends Controller
{
    public function show($brand_id, $brand_slug)
    {

        $brand = Brand::findOrFail($brand_id);
        $manuals = Manual::all()->where('brand_id', $brand_id);

        return view('pages/manual_list', [
            "brand" => $brand,
            "manuals" => $manuals
        ]);

    }

    public function edit($brand_id, $brand_slug)
    {
        // Load brand data for editing
    }

    public function update($brand_id, $brand_slug)
    {
        // Update brand information
    }
}
