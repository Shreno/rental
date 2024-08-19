<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class NeighborhoodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql = File::get(database_path('seeders/sa_neighborhoods.sql'));

        preg_match_all('/\((\d+),\s*\'([^\']+)\',\s*\'([^\']+)\',\s*(\d+),\s*\'[^\']+\',\s*\'[^\']+\'\)/', $sql, $matches, PREG_SET_ORDER);


        // تجهيز البيانات للإدخال
        $neighborhoods = [];
        foreach ($matches as $match) {
            $neighborhoods[] = [
                'id' => $match[1],
                'name' => json_encode(['ar' => $match[2], 'en' => $match[3]]),
                'city_id' => $match[4],
                'image' => null,
            ];
        }

        // إدخال البيانات في جدول neighborhoods
        DB::table('neighborhoods')->insert($neighborhoods);
    }
}
