<?php

namespace App\Http\Controllers\Website;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\City;
use App\Models\Banner;
use App\Models\PropertyFeature;


class ForntEndController extends Controller
{
    public function home()
    {
        $properties = Property::orderBy('created_at','desc')->where('is_active',1)->where('publish',1)->limit(8)->get();
        $propertyFeatures = PropertyFeature::all();

        $banner = Banner::first();

        $cities = City::whereNotNull('image')
                  ->inRandomOrder()
                  ->get();

        return view('website.pages.home',[
            'banner' => $banner,
            'cities' => $cities,
            'properties' => $properties,
            'propertyFeatures'=>$propertyFeatures
        ]);
    }


    public function SetLanguage($lang)
    {
    
        if ( in_array( $lang, [ 'ar', 'en' ] ) ) {

            if ( session() -> has( 'lang' ) )
                session() -> forget( 'lang' );

            session() -> put( 'lang', $lang );

        } else {
            if ( session() -> has( 'lang' ) )
                session() -> forget( 'lang' );

            session() -> put( 'lang', 'ar' );
        }
        return back();
    }}
