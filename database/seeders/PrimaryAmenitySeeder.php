<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PrimaryAmenity;
use Illuminate\Support\Facades\DB;

class PrimaryAmenitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('primary_amenities')->insert([
            ['name' => json_encode(['ar' => 'غرفة النوم', 'en' => 'Bedroom']), 'icon' => 'amenities/bedroom.png'],
            ['name' => json_encode(['ar' => 'المجلس', 'en' => 'Divan']), 'icon' => 'amenities/divan.png'],
            ['name' => json_encode(['ar' => 'المسبح', 'en' => 'Pool']), 'icon' => 'amenities/pool.png'],
            ['name' => json_encode(['ar' => 'المطبخ', 'en' => 'Kitchen']), 'icon' => 'amenities/kitchen.png'],
            ['name' => json_encode(['ar' => 'دورة المياه', 'en' => 'Bathroom']), 'icon' => 'amenities/bathroom.png'],
        ]);

       
    }
}
