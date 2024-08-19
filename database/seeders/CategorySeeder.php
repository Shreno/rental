<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
                [
                    'name' => json_encode(['ar' => ' مزارع' , 'en' => 'farmers']) ,
                    'desc' => json_encode(['ar' => ' مزارع' , 'en' => 'farmers']) ,
                    'image' => 'categories/farmers.png' ,
                ],
                [
                    'name' => json_encode(['ar' => ' شقق وبيوت خاصة' , 'en' => 'Apartments and private houses']) ,
                    'desc' => json_encode(['ar' => '  شقق وبيوت خاصة' , 'en' => 'Apartments and private houses']) ,
                    'image' => 'categories/Apartments.png' ,
                ],
                [
                    'name' => json_encode(['ar' => ' مخيمات' , 'en' => 'Camps']) ,
                    'desc' => json_encode(['ar' => ' مخيمات' , 'en' => 'Camps']) ,
                    'image' => 'categories/Camps.png' ,
                ]
        ]);
    }
}
