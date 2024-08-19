<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\City;
use App\Models\Banner;

class ForntEndController extends Controller
{
    public function home()
    {
        $properties = Property::orderBy('created_at','desc')->limit(8)->get();
        $banner = Banner::first();

        $cities = City::whereNotNull('image')
                  ->inRandomOrder()
                  ->take(10)
                  ->get();

        return view('pages.home',[
            'banner' => $banner,
            'cities' => $cities,
            'properties' => $properties
        ]);
    }
}
