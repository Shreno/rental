<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            ['id' => 1, 'name' => json_encode(['ar' => 'تبوك', 'en' => 'Tabuk']), 'image' => "cities/Tabuk.jpg"],
            ['id' => 3, 'name' => json_encode(['ar' => 'الرياض', 'en' => 'Riyadh']), 'image' => "cities/Riyadh.jpg"],
            ['id' => 5, 'name' => json_encode(['ar' => 'الطائف', 'en' => 'At Taif']), 'image' => "cities/Taif.jpg"],
            ['id' => 6, 'name' => json_encode(['ar' => 'مكة المكرمة', 'en' => 'Makkah Al Mukarramah']), 'image' => "cities/Makkah.jpg"],
            ['id' => 10, 'name' => json_encode(['ar' => 'حائل', 'en' => 'Hail']), 'image' => "cities/Hail.jpg"],
            ['id' => 11, 'name' => json_encode(['ar' => 'بريدة', 'en' => 'Buraydah']), 'image' => "cities/Buraydah.jpg"],
            ['id' => 12, 'name' => json_encode(['ar' => 'الهفوف', 'en' => 'Al Hufuf']), 'image' => "cities/Hufuf.jpg"],
            ['id' => 13, 'name' => json_encode(['ar' => 'الدمام', 'en' => 'Ad Dammam']), 'image' => "cities/Dammam.JPG"],
            ['id' => 14, 'name' => json_encode(['ar' => 'المدينة المنورة', 'en' => 'Al Madinah Al Munawwarah']), 'image' => "cities/Munawwarah.jpg"],
            ['id' => 15, 'name' => json_encode(['ar' => 'ابها', 'en' => 'Abha']), 'image' => null],
            ['id' => 17, 'name' => json_encode(['ar' => 'جازان', 'en' => 'Jazan']), 'image' => null],
            ['id' => 18, 'name' => json_encode(['ar' => 'جدة', 'en' => 'Jeddah']), 'image' => null],
            ['id' => 24, 'name' => json_encode(['ar' => 'المجمعة', 'en' => 'Al Majmaah']), 'image' => null],
            ['id' => 31, 'name' => json_encode(['ar' => 'الخبر', 'en' => 'Al Khubar']), 'image' => null],
            ['id' => 47, 'name' => json_encode(['ar' => 'حفر الباطن', 'en' => 'Hafar Al Batin']), 'image' => null],
            ['id' => 62, 'name' => json_encode(['ar' => 'خميس مشيط', 'en' => 'Khamis Mushayt']), 'image' => null],
            ['id' => 65, 'name' => json_encode(['ar' => 'احد رفيده', 'en' => 'Ahad Rifaydah']), 'image' => null],
            ['id' => 67, 'name' => json_encode(['ar' => 'القطيف', 'en' => 'Al Qatif']), 'image' => null],
            ['id' => 80, 'name' => json_encode(['ar' => 'عنيزة', 'en' => 'Unayzah']), 'image' => null],
            ['id' => 89, 'name' => json_encode(['ar' => 'قرية العليا', 'en' => 'Qaryat Al Ulya']), 'image' => null],
            ['id' => 113, 'name' => json_encode(['ar' => 'الجبيل', 'en' => 'Al Jubail']), 'image' => null],
            ['id' => 115, 'name' => json_encode(['ar' => 'النعيرية', 'en' => 'An Nuayriyah']), 'image' => null],
            ['id' => 227, 'name' => json_encode(['ar' => 'الظهران', 'en' => 'Dhahran']), 'image' => null],
            ['id' => 233, 'name' => json_encode(['ar' => 'الوجه', 'en' => 'Al Wajh']), 'image' => null],
            ['id' => 243, 'name' => json_encode(['ar' => 'بقيق', 'en' => 'Buqayq']), 'image' => null],
            ['id' => 270, 'name' => json_encode(['ar' => 'الزلفي', 'en' => 'Az Zulfi']), 'image' => null],
            ['id' => 288, 'name' => json_encode(['ar' => 'خيبر', 'en' => 'Khaybar']), 'image' => null],
            ['id' => 306, 'name' => json_encode(['ar' => 'الغاط', 'en' => 'Al Ghat']), 'image' => null],
            ['id' => 323, 'name' => json_encode(['ar' => 'املج', 'en' => 'Umluj']), 'image' => null],
            ['id' => 377, 'name' => json_encode(['ar' => 'رابغ', 'en' => 'Rabigh']), 'image' => null],
            ['id' => 418, 'name' => json_encode(['ar' => 'عفيف', 'en' => 'Afif']), 'image' => null],
            ['id' => 443, 'name' => json_encode(['ar' => 'ثادق', 'en' => 'Thadiq']), 'image' => null],
            ['id' => 454, 'name' => json_encode(['ar' => 'سيهات', 'en' => 'Sayhat']), 'image' => null],
            ['id' => 456, 'name' => json_encode(['ar' => 'تاروت', 'en' => 'Tarut']), 'image' => null],
            ['id' => 483, 'name' => json_encode(['ar' => 'ينبع', 'en' => 'Yanbu']), 'image' => null],
            ['id' => 500, 'name' => json_encode(['ar' => 'شقراء', 'en' => 'Shaqra']), 'image' => null],
            ['id' => 669, 'name' => json_encode(['ar' => 'الدوادمي', 'en' => 'Ad Duwadimi']), 'image' => null],
            ['id' => 828, 'name' => json_encode(['ar' => 'الدرعية', 'en' => 'Ad Diriyah']), 'image' => null],
            ['id' => 880, 'name' => json_encode(['ar' => 'القويعية', 'en' => 'Quwayiyah']), 'image' => null],
            ['id' => 990, 'name' => json_encode(['ar' => 'المزاحمية', 'en' => 'Al Muzahimiyah']), 'image' => null],
            ['id' => 1053, 'name' => json_encode(['ar' => 'بدر', 'en' => 'Badr']), 'image' => null],
            ['id' => 1061, 'name' => json_encode(['ar' => 'الخرج', 'en' => 'Al Kharj']), 'image' => null],
            ['id' => 1073, 'name' => json_encode(['ar' => 'الدلم', 'en' => 'Ad Dilam']), 'image' => null],
            ['id' => 1228, 'name' => json_encode(['ar' => 'الشنان', 'en' => 'Ash Shinan']), 'image' => null],
            ['id' => 1248, 'name' => json_encode(['ar' => 'الخرمة', 'en' => 'Al Khurmah']), 'image' => null],
            ['id' => 1257, 'name' => json_encode(['ar' => 'الجموم', 'en' => 'Al Jumum']), 'image' => null],
            ['id' => 1294, 'name' => json_encode(['ar' => 'المجاردة', 'en' => 'Al Majardah']), 'image' => null],
            ['id' => 1361, 'name' => json_encode(['ar' => 'السليل', 'en' => 'As Sulayyil']), 'image' => null],
            ['id' => 1443, 'name' => json_encode(['ar' => 'تثليث', 'en' => 'Tathilith']), 'image' => null],
            ['id' => 1514, 'name' => json_encode(['ar' => 'بيشة', 'en' => 'Bishah']), 'image' => null],
            ['id' => 1542, 'name' => json_encode(['ar' => 'الباحة', 'en' => 'Al Baha']), 'image' => null],
            ['id' => 1625, 'name' => json_encode(['ar' => 'القنفذة', 'en' => 'Al Qunfidhah']), 'image' => null],
            ['id' => 1801, 'name' => json_encode(['ar' => 'محايل', 'en' => 'Muhayil']), 'image' => null],
            ['id' => 1879, 'name' => json_encode(['ar' => 'ثول', 'en' => 'Thuwal']), 'image' => null],
            ['id' => 1947, 'name' => json_encode(['ar' => 'ضبا', 'en' => 'Duba']), 'image' => null],
            ['id' => 2156, 'name' => json_encode(['ar' => 'تربه', 'en' => 'Turbah']), 'image' => null],
            ['id' => 2167, 'name' => json_encode(['ar' => 'صفوى', 'en' => 'Safwa']), 'image' => null],
            ['id' => 2171, 'name' => json_encode(['ar' => 'عنك', 'en' => 'Inak']), 'image' => null],
            ['id' => 2208, 'name' => json_encode(['ar' => 'طريف', 'en' => 'Turaif']), 'image' => null],
            ['id' => 2213, 'name' => json_encode(['ar' => 'عرعر', 'en' => 'Arar']), 'image' => null],
            ['id' => 2226, 'name' => json_encode(['ar' => 'القريات', 'en' => 'Al Qurayyat']), 'image' => null],
            ['id' => 2237, 'name' => json_encode(['ar' => 'سكاكا', 'en' => 'Sakaka']), 'image' => null],
            ['id' => 2256, 'name' => json_encode(['ar' => 'رفحاء', 'en' => 'Rafha']), 'image' => null],
            ['id' => 2268, 'name' => json_encode(['ar' => 'دومة الجندل', 'en' => 'Dawmat Al Jandal']), 'image' => null],
            ['id' => 2421, 'name' => json_encode(['ar' => 'الرس', 'en' => 'Ar Rass']), 'image' => null],
            ['id' => 2448, 'name' => json_encode(['ar' => 'المذنب', 'en' => 'Al Midhnab']), 'image' => null],
            ['id' => 2464, 'name' => json_encode(['ar' => 'الخفجي', 'en' => 'Al Khafji']), 'image' => null],
            ['id' => 2467, 'name' => json_encode(['ar' => 'رياض الخبراء', 'en' => 'Riyad Al Khabra']), 'image' => null],
            ['id' => 2481, 'name' => json_encode(['ar' => 'البدائع', 'en' => 'Al Badai']), 'image' => null],
            ['id' => 2590, 'name' => json_encode(['ar' => 'رأس تنورة', 'en' => 'Ras Tannurah']), 'image' => null],
            ['id' => 2630, 'name' => json_encode(['ar' => 'البكيرية', 'en' => 'Al Bukayriyah']), 'image' => null],
            ['id' => 2777, 'name' => json_encode(['ar' => 'الشماسية', 'en' => 'Ash Shimasiyah']), 'image' => null],
            ['id' => 3158, 'name' => json_encode(['ar' => 'الحريق', 'en' => 'Al Hariq']), 'image' => null],
            ['id' => 3161, 'name' => json_encode(['ar' => 'حوطة بني تميم', 'en' => 'Hawtat Bani Tamim']), 'image' => null],
            ['id' => 3174, 'name' => json_encode(['ar' => 'ليلى', 'en' => 'Layla']), 'image' => null],
            ['id' => 3275, 'name' => json_encode(['ar' => 'بللسمر', 'en' => 'Billasmar']), 'image' => null],
            ['id' => 3347, 'name' => json_encode(['ar' => 'شرورة', 'en' => 'Sharurah']), 'image' => null],
            ['id' => 3417, 'name' => json_encode(['ar' => 'نجران', 'en' => 'Najran']), 'image' => null],
            ['id' => 3479, 'name' => json_encode(['ar' => 'صبيا', 'en' => 'Sabya']), 'image' => null],
            ['id' => 3525, 'name' => json_encode(['ar' => 'ابو عريش', 'en' => 'Abu Arish']), 'image' => null],
            ['id' => 3542, 'name' => json_encode(['ar' => 'صامطة', 'en' => 'Samtah']), 'image' => null],
            ['id' => 3652, 'name' => json_encode(['ar' => 'احد المسارحة', 'en' => 'Ahad Al Musarihah']), 'image' => null],
            ['id' => 3666, 'name' => json_encode(['ar' => 'مدينة الملك عبدالله الاقتصادية', 'en' => 'King Abdullah Economic City']), 'image' => null],
        ]);
    }
}

