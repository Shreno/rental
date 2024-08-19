<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrimaryAmenity;
use Illuminate\Support\Facades\Validator;
use App\Models\SubAmenity;
use App\Models\SubAmenityOption;

class SubAmenitiesController extends Controller
{
    /**
     * Display a listing of the sub-amenities.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subAmenities = SubAmenity::with('amenity')->orderBy('created_at','desc')->paginate(50);
        return view('dashboard.sub_amenities.index', compact('subAmenities'));
    }

    /**
     * Show the form for creating a new sub-amenity.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $primaryAmenities = PrimaryAmenity::all();
        return view('dashboard.sub_amenities.create', compact('primaryAmenities'));
    }

    /**
     * Store a newly created sub-amenity in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'primary_amenity_id' => 'required|exists:primary_amenities,id',
            'name.ar' => 'required|string|max:191|unique:sub_amenities,name->ar',
            'name.en' => 'required|string|max:191|unique:sub_amenities,name->en',
            'type' => 'required|string',
            'is_required' => 'required|boolean',
        ]);

        $subAmenity = SubAmenity::create($data);

        if ($request->has('options')) {
            foreach ($request->options['ar'] as $index => $optionAr) {
                $optionEn = $request->options['en'][$index] ?? null;
                SubAmenityOption::create([
                    'sub_amenity_id' => $subAmenity->id,
                    'name' => ['ar' => $optionAr, 'en' => $optionEn],
                ]);
            }
        }
       
        return response()->json();
    }

    /**
     * Show the form for editing the specified sub-amenity.
     *
     * @param  \App\Models\SubAmenity  $subAmenity
     * @return \Illuminate\Http\Response
     */
    public function edit( $subAmenity)
    {
        $subAmenity = SubAmenity::findOrFail($subAmenity);
        $primaryAmenities = PrimaryAmenity::all();
        return view('dashboard.sub_amenities.create', compact('subAmenity', 'primaryAmenities'));
    }

    /**
     * Update the specified sub-amenity in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubAmenity  $subAmenity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $subAmenity)
    {
        $subAmenity = SubAmenity::findOrFail($subAmenity);

        $data = $request->validate([
            'primary_amenity_id' => 'required|exists:primary_amenities,id',
            'name.ar' => 'required|string|max:191|unique:sub_amenities,name->ar,' . $subAmenity->id,
            'name.en' => 'required|string|max:191|unique:sub_amenities,name->en,' . $subAmenity->id,
            'type' => 'required|string',
            'is_required' => 'required|boolean',
        ]);

     
        $subAmenity->update($data);

        $subAmenity->options()->delete();
        if ($request->has('options')) {
            foreach ($request->options['ar'] as $index => $optionAr) {
                $optionEn = $request->options['en'][$index] ?? null;
                SubAmenityOption::create([
                    'sub_amenity_id' => $subAmenity->id,
                    'name' => ['ar' => $optionAr, 'en' => $optionEn],
                ]);
            }
        }

        return response()->json();
    }

    /**
     * Remove the specified sub-amenity from storage.
     *
     * @param  \App\Models\SubAmenity  $subAmenity
     * @return \Illuminate\Http\Response
     */
    public function destroy( $subAmenity)
    {
        $subAmenity = SubAmenity::findOrFail($subAmenity);
        $subAmenity->delete();
        return response()->json();
    }
}
