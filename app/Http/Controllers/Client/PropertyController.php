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
use App\Notifications\NotifyUser;
use Illuminate\Support\Facades\Notification;
use App\Services\ChatGPTService;
use Illuminate\Support\Facades\App;






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
        $subAmenities = SubAmenity::orderBy('primary_amenity_id','ASC')->get();
        $propertyFeatures = PropertyFeature::all();
        $bookingConditions=BookingCondition::all();


        
        return view('client.properties.create', compact('cities', 'neighborhoods', 'users', 'primaryAmenities', 'subAmenities', 'propertyFeatures','bookingConditions'));
    }

    public function store(Request $request)
    {
        $sub_amenities = json_decode($request->sub_amenities, true);
        $totalQuantity = array_sum($sub_amenities);
      



        $data = $request->validate([
            'title' => 'required|string|max:191',
            'description' => 'nullable|string',
            'map' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',
            'city_id' => 'required|exists:cities,id',
            'neighborhood_id' => 'required|exists:neighborhoods,id',
            'direction' => 'required|in:north,south,east,west',
            'primary_amenities' => 'required',
            'sub_amenities' => 'required',
            'property_features' => 'required',
            'images' => 'required|array|min:' . $totalQuantity, // totalQuantity should be calculated based on sub_amenities
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // adjust file validation as needed


            'bookingConditions'=>'nullable',
            'check_in_time' => 'required|date_format:H:i', // Validate check-in time
            'check_out_time' => 'required|date_format:H:i', // Validate check-out time
            'rate_per_day' =>'required|numeric|min:0',
      ]);
      $locale = App::getLocale();
    
         $title = [
          'ar' => '',
          'en' => '',
        ];
        $description=[
            'ar' => '',
            'en' => '',
        ];
      if ($locale === 'ar') {
          $title['ar'] = $request->input('title');
          $description['ar'] = $request->input('description');

      } else {
          $title['en'] = $request->input('title');
          $description['en'] = $request->input('description');

      }


        $property = Property::create([
            'title' => $title,
            'description' =>$description,
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
        $primary_amenities = array_filter(explode(',', $request->primary_amenities), function($value) {
            return !empty($value);
        });
        $property_features = array_filter(explode(',', $request->property_features), function($value) {
            return !empty($value);
        });


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
            $bookingConditions = array_filter(explode(',', $request->bookingConditions), function($value) {
                return !empty($value);
            });

            $property->propertyBookingConditions()->attach($bookingConditions);

        }


        foreach ($data['images'] as $image) {
            $property->images()->create(['image' => $image]);
        }

        $notifyRequest=[
            'type'=>'notify',
            'title_ar'=>'تم إضافة  العقار: ' . $property->getTranslation('title', 'ar'),
            'title_en'=>'The property has been added'.$property->getTranslation('title', 'en'),
            'body_ar'=>'تم إضافة  العقار: ' . $property->getTranslation('title', 'ar'),
            'body_en'=>'sThe property has been added'.$property->getTranslation('title', 'en'),
        ];
        // 
        $user=User::find(1);
        Notification::send($user , new NotifyUser($notifyRequest));


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
            'title' => 'required|string|max:191',
            'description' => 'nullable|string',
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

        $locale = App::getLocale();
    
        $title = [
         'ar' => '',
         'en' => '',
       ];
       $description=[
           'ar' => '',
           'en' => '',
       ];
     if ($locale === 'ar') {
         $title['ar'] = $request->input('title');
         $description['ar'] = $request->input('description');

     } else {
         $title['en'] = $request->input('title');
         $description['en'] = $request->input('description');

     }




    

        $property->update([
            'title' => $title,
            'description' => $description,
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
