<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PropertyFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('property_features')->insert([
            ['name' => json_encode(['ar' => 'دخول ذاتي', 'en' => 'Self Check-in']), 'icon' => 'propertyfeatures/icon1.png'],
            ['name' => json_encode(['ar' => 'انترنت', 'en' => 'Internet']), 'icon' => 'propertyfeatures/Internet.png'],
            ['name' => json_encode(['ar' => 'اطلالة على الحديقة', 'en' => 'Garden View']), 'icon' => 'propertyfeatures/GardenView.png'],
            ['name' => json_encode(['ar' => 'اطلالة على الجبل', 'en' => 'Mountain View']), 'icon' => 'propertyfeatures/MountainView.png'],
            ['name' => json_encode(['ar' => 'مدخل سيارة', 'en' => 'Car Entrance']), 'icon' => 'propertyfeatures/CarEntrance.png'],
            ['name' => json_encode(['ar' => 'شلال على الجبل', 'en' => 'Mountain Waterfall']), 'icon' => 'propertyfeatures/MountainWaterfall.png'],
        ]);
    }
}
