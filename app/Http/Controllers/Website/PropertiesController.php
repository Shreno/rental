<?php

namespace App\Http\Controllers\Website;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\City;

class PropertiesController extends Controller
{
    public function index()
    {
        $properties = Property::orderBy('created_at','desc')->where('is_active',1)->where('publish',1)->paginate(24);
        $propertiesAll=Property::orderBy('created_at','desc')->where('is_active',1)->where('publish',1)->count();

        $cities = City::whereNotNull('image')
                  ->inRandomOrder()
                  ->get();

        return view('website.pages.properties',[
            'cities' => $cities,
            'properties' => $properties,
            'propertiesAll'=>$propertiesAll
        ]);
    }


    public function show($id){
        $property = Property::find($id);
       

        return view('website.pages.property',[
            'property' => $property
        ]);

    }


}
