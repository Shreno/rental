<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\BookingCondition;
use App\Models\Property;
use App\Models\City;
use App\Models\Neighborhood;
use App\Models\User;
use App\Models\PrimaryAmenity;
use App\Models\SubAmenity;
use App\Models\PropertyFeature;
use Illuminate\Http\Request;
use App\Models\Property_Sub_Amenity;
use App\Helpers\Notifications;
use App\Models\PropertyImage;
use Illuminate\Support\Facades\Storage;


class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::paginate(50);

        return view('dashboard.properties.index', compact('properties'));
    }

    public function create()
    {
        $cities = City::all();
        $neighborhoods = Neighborhood::all();
        $users = User::where('user_type',2)->get();
        $primaryAmenities = PrimaryAmenity::all();
        $subAmenities = SubAmenity::all();
        $propertyFeatures = PropertyFeature::all();
        $bookingConditions=BookingCondition::all();


        
        return view('client.properties.create', compact('cities', 'neighborhoods', 'users', 'primaryAmenities', 'subAmenities', 'propertyFeatures','bookingConditions'));
    }

    public function store(Request $request)
    {
        $sub_amenities = json_decode($request->sub_amenities, true);
        $data = $request->validate([
            'title.ar' => 'required|string|max:191',
            'title.en' => 'required|string|max:191',
            'description.ar' => 'nullable|string',
            'description.en' => 'nullable|string',
            'map' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',
            'city_id' => 'required|exists:cities,id',
            'neighborhood_id' => 'required|exists:neighborhoods,id',
            'direction' => 'required|in:north,south,east,west',
            'primary_amenities' => 'required',
            'sub_amenities' => 'required',
            'property_features' => 'required',
            'images' => 'required|array',
            'bookingConditions'=>'nullable',
            'check_in_time' => 'required|date_format:H:i', // Validate check-in time
            'check_out_time' => 'required|date_format:H:i', // Validate check-out time
            'rate_per_day' =>'required|numeric|min:0',
      ]);

        $property = Property::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'map' => $data['map'],
            'address' => $data['address'],
            'city_id' => $data['city_id'],
            'neighborhood_id' => $data['neighborhood_id'],
            'direction' => $data['direction'],
            'user_id' => auth()->user()->id,
            'check_in_time'=>$data['check_in_time'],
            'check_out_time'=>$data['check_out_time'],
            'rate_per_day'=>$data['rate_per_day'],

        ]);
        $primary_amenities = json_decode($request->primary_amenities, true);
        $property_features = json_decode($request->property_features, true);

        $property->primaryAmenities()->attach($primary_amenities);
        $property->propertyFeatures()->attach($property_features);
        $sub_amenities = json_decode($request->sub_amenities, true);
       foreach($sub_amenities as $i=>$sub_amenitie)
       {
        $Property_Sub_Amenity=new Property_Sub_Amenity();
        $Property_Sub_Amenity->property_id=$property->id;
        $Property_Sub_Amenity->sub_amenity_id=$i;
        $Property_Sub_Amenity->number=$sub_amenitie;
        $Property_Sub_Amenity->save();


       }


        if($request->bookingConditions!==null)
        {
            $bookingConditions = explode(',', $data['bookingConditions']);

            $property->propertyBookingConditions()->attach($bookingConditions);

        }


        foreach ($data['images'] as $image) {
            $property->images()->create(['image' => $image]);
        }
        Notifications::addNotification('تمت إضافة عقار جديد', 'تمت اضافة عقار جديد يرجى الموافقة علية.'.$property->title .route('properties.index').'');


        return redirect()->route('client.dashboard');
    }

    public function edit( $property)
    {
        $property = Property::findOrFail($property);
        $cities = City::all();
        $neighborhoods = Neighborhood::all();
        $users = User::where('user_type',2)->get();
        $primaryAmenities = PrimaryAmenity::all();
        $subAmenities = SubAmenity::all();
        $propertyFeatures = PropertyFeature::all();
        $bookingConditions=BookingCondition::all();


        return view('client.properties.edit', compact('bookingConditions','property', 'cities', 'neighborhoods', 'users', 'primaryAmenities', 'subAmenities', 'propertyFeatures'));
    }

    public function update(Request $request,  $property)
    {
        $property = Property::findOrFail($property);
        $data = $request->validate([
            'title.ar' => 'required|string|max:191',
            'title.en' => 'required|string|max:191',
            'description.ar' => 'nullable|string',
            'description.en' => 'nullable|string',
            'map' => 'nullable|string',
            'address' => 'required|string|max:255',
            'city_id' => 'required|exists:cities,id',
            'neighborhood_id' => 'required|exists:neighborhoods,id',
            'direction' => 'required|in:north,south,east,west',
            'primary_amenities' => 'required',
            // 'sub_amenities' => 'required|array',
            'property_features' => 'required',
            'bookingConditions'=>'nullable',
            'images' => 'nullable|array',
            'check_in_time' => 'required', // Validate check-in time
            'check_out_time' => 'required', // Validate check-out time
            'rate_per_day'  =>'required|numeric|min:0'


        ]);



    

        $property->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'map' => $data['map'],
            'address' => $data['address'],
            'city_id' => $data['city_id'],
            'neighborhood_id' => $data['neighborhood_id'],
            'direction' => $data['direction'],
            'check_in_time'=>$data['check_in_time'],
            'check_out_time'=>$data['check_out_time'],
            'rate_per_day'=>$data['rate_per_day'],
            'is_active'=>0

            
        

        ]);

        dd($data['primary_amenities']);

        // $property->primaryAmenities()->sync($data['primary_amenities']);
        // $property->subAmenities()->sync($data['sub_amenities']);

        $propertyFeatures = explode(',', $request->property_features);
        $property->propertyFeatures()->sync($propertyFeatures);

        if($request->bookingConditions!==null)
        {
            $bookingConditions = explode(',', $request->bookingConditions);

            $property->propertyBookingConditions()->sync($bookingConditions);

        }

        // if (isset($data['images'])) {
        //     $property->images()->delete();
        //     foreach ($data['images'] as $image) {
        //         $property->images()->create(['image' => $image]);
        //     }
        // }

        return back();
    }
    public function show ($id){

    }
    public function destroy($property){
        $property = Property::findOrFail($property);
        if($property->is_active==1)
        {
            if($property->publish==1)
            {            $property->update(['publish'=>0]);


            }else{
                $property->update(['publish'=>1]);

            }


        }else{
            $property->delete();
        }
        return back();
  

    }
    public function delete_image($id){
        $image = PropertyImage::find($id);
        if ($image) {
            // Remove the image file from storage
            Storage::delete($image->image);
    
            // Delete the image record from the database
            $image->delete();
    
            return response()->json(['success' => true]);
        }
    
        return response()->json(['success' => false, 'error' => 'Image not found'], 404);
    }
}
