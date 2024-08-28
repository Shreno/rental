<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use App\Models\Property;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $property_Active = Property::where('user_id', auth()->user()->id)->latest()->where('is_active',1)->count();
        $property_Inctive = Property::where('user_id', auth()->user()->id)->latest()->where('is_active',0)->count();


        $properties = Property::where('user_id', auth()->user()->id)
        ->latest()
        ->get();
        return view('client.home',compact('properties','property_Active','property_Inctive'));
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
    }
}
