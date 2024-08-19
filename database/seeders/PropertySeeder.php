<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Property;
use App\Models\City;
use App\Models\Neighborhood;
use App\Models\User;
use App\Models\PrimaryAmenity;
use App\Models\SubAmenity;
use App\Models\PropertyFeature;

class PropertySeeder extends Seeder
{
    public function run()
    {
        // Ensure the related models have data
        $city = City::first();
        $neighborhood = Neighborhood::first();
        $user = User::first();

        if (!$city || !$neighborhood || !$user) {
            return;
        }

        $property1 = Property::create([
            'title' => ['ar' => 'عنوان العقار', 'en' => 'Property Title'],
            'description' => ['ar' => 'وصف العقار', 'en' => 'Property Description'],
            'map' => 'https://maps.example.com/property-location',
            'address' => '123 Property Address',
            'city_id' => $city->id,
            'neighborhood_id' => $neighborhood->id,
            'direction' => 'north',
            'user_id' => $user->id,
        ]);

        $property2 = Property::create([
            'title' => ['ar' => 'عقار مميز جدا ', 'en' => 'Featured property'],
            'description' => ['ar' => 'عقار مميز جدا', 'en' => 'Featured property Description'],
            'map' => 'https://maps.example.com/property-location',
            'address' => '123 Property Address',
            'city_id' => $city->id,
            'neighborhood_id' => $neighborhood->id,
            'direction' => 'north',
            'user_id' => $user->id,
        ]);

        $property3 = Property::create([
            'title' => ['ar' => 'عقار مميز جدا 2', 'en' => 'Featured property 2'],
            'description' => ['ar' => 'عقار مميز جدا 2', 'en' => 'Featured property Description 2'],
            'map' => 'https://maps.example.com/property-location',
            'address' => '123 Property Address',
            'city_id' => $city->id,
            'neighborhood_id' => $neighborhood->id,
            'direction' => 'north',
            'user_id' => $user->id,
        ]);

        $property4 = Property::create([
            'title' => ['ar' => 'عقار مميز جدا 3', 'en' => 'Featured property 3'],
            'description' => ['ar' => 'عقار مميز جدا 4' , 'en' => 'Featured property Description 3'],
            'map' => 'https://maps.example.com/property-location',
            'address' => '123 Property Address',
            'city_id' => $city->id,
            'neighborhood_id' => $neighborhood->id,
            'direction' => 'north',
            'user_id' => $user->id,
        ]);

        $property5 = Property::create([
            'title' => ['ar' => 'عقار مميز جدا 3', 'en' => 'Featured property 3'],
            'description' => ['ar' => 'عقار مميز جدا 4' , 'en' => 'Featured property Description 3'],
            'map' => 'https://maps.example.com/property-location',
            'address' => '123 Property Address',
            'city_id' => $city->id,
            'neighborhood_id' => $neighborhood->id,
            'direction' => 'north',
            'user_id' => $user->id,
        ]);


        $property6 = Property::create([
            'title' => ['ar' => 'عقار مميز جدا 5', 'en' => 'Featured property 5'],
            'description' => ['ar' => 'عقار مميز جدا 5' , 'en' => 'Featured property Description 5'],
            'map' => 'https://maps.example.com/property-location',
            'address' => '123 Property Address',
            'city_id' => $city->id,
            'neighborhood_id' => $neighborhood->id,
            'direction' => 'north',
            'user_id' => $user->id,
        ]);


        $property7 = Property::create([
            'title' => ['ar' => 'عقار مميز جدا 7', 'en' => 'Featured property 7'],
            'description' => ['ar' => 'عقار مميز جدا 7' , 'en' => 'Featured property Description 7'],
            'map' => 'https://maps.example.com/property-location',
            'address' => '123 Property Address',
            'city_id' => $city->id,
            'neighborhood_id' => $neighborhood->id,
            'direction' => 'north',
            'user_id' => $user->id,
        ]);


        $property8 = Property::create([
            'title' => ['ar' => 'عقار مميز جدا 8', 'en' => 'Featured property 8'],
            'description' => ['ar' => 'عقار مميز جدا 8' , 'en' => 'Featured property Description 8'],
            'map' => 'https://maps.example.com/property-location',
            'address' => '123 Property Address',
            'city_id' => $city->id,
            'neighborhood_id' => $neighborhood->id,
            'direction' => 'north',
            'user_id' => $user->id,
        ]);

        $primaryAmenities = PrimaryAmenity::take(3)->get();
        $subAmenities = SubAmenity::take(5)->get();
        $propertyFeatures = PropertyFeature::take(3)->get();

        $property2->primaryAmenities()->attach($primaryAmenities);
        $property2->subAmenities()->attach($subAmenities);
        $property2->propertyFeatures()->attach($propertyFeatures);

        $property3->primaryAmenities()->attach($primaryAmenities);
        $property3->subAmenities()->attach($subAmenities);
        $property3->propertyFeatures()->attach($propertyFeatures);

        $property4->primaryAmenities()->attach($primaryAmenities);
        $property4->subAmenities()->attach($subAmenities);
        $property4->propertyFeatures()->attach($propertyFeatures);

        $property5->primaryAmenities()->attach($primaryAmenities);
        $property5->subAmenities()->attach($subAmenities);
        $property5->propertyFeatures()->attach($propertyFeatures);

        $property6->primaryAmenities()->attach($primaryAmenities);
        $property6->subAmenities()->attach($subAmenities);
        $property6->propertyFeatures()->attach($propertyFeatures);

        $property7->primaryAmenities()->attach($primaryAmenities);
        $property7->subAmenities()->attach($subAmenities);
        $property7->propertyFeatures()->attach($propertyFeatures);

        $property8->primaryAmenities()->attach($primaryAmenities);
        $property8->subAmenities()->attach($subAmenities);
        $property8->propertyFeatures()->attach($propertyFeatures);

        $property1->primaryAmenities()->attach($primaryAmenities);
        $property1->subAmenities()->attach($subAmenities);
        $property1->propertyFeatures()->attach($propertyFeatures);

        

        // Example of attaching images (you need to replace this with actual image paths)
        $property1->images()->createMany([
            ['image' => 'properties/property1.webp'],
            ['image' => 'properties/property2.jpg'],
            ['image' => 'properties/property3.jpg'],
            ['image' => 'properties/property4.jpg'],
        ]);

        $property2->images()->createMany([
            ['image' => 'properties/property2.jpg'],
            ['image' => 'properties/property3.jpg'],
            ['image' => 'properties/property1.webp'],
            ['image' => 'properties/property4.jpg'],
        ]);

        $property3->images()->createMany([
            ['image' => 'properties/property3.jpg'],
            ['image' => 'properties/property2.jpg'],
            ['image' => 'properties/property1.webp'],
            ['image' => 'properties/property4.jpg'],
        ]);

        $property4->images()->createMany([
            ['image' => 'properties/property4.jpg'],
            ['image' => 'properties/property3.jpg'],
            ['image' => 'properties/property2.jpg'],
            ['image' => 'properties/property1.webp'],
        ]);

        $property5->images()->createMany([
            ['image' => 'properties/property5.jpg'],
            ['image' => 'properties/property3.jpg'],
            ['image' => 'properties/property2.jpg'],
            ['image' => 'properties/property1.webp'],
        ]);

        $property6->images()->createMany([
            ['image' => 'properties/property6.webp'],
            ['image' => 'properties/property3.jpg'],
            ['image' => 'properties/property2.jpg'],
            ['image' => 'properties/property1.webp'],
        ]);

        $property7->images()->createMany([
            ['image' => 'properties/property7.jpg'],
            ['image' => 'properties/property3.jpg'],
            ['image' => 'properties/property2.jpg'],
            ['image' => 'properties/property1.webp'],
        ]);

        $property8->images()->createMany([
            ['image' => 'properties/property8.jpg'],
            ['image' => 'properties/property3.jpg'],
            ['image' => 'properties/property2.jpg'],
            ['image' => 'properties/property1.webp'],
        ]);

    }
}
