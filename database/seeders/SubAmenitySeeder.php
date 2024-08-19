<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SubAmenity;
use App\Models\SubAmenityOption;
use App\Models\PrimaryAmenity;
use Illuminate\Support\Facades\DB;
class SubAmenitySeeder extends Seeder
{
    public function run()
    {

        DB::table('sub_amenities')->insert([
            [
                'primary_amenity_id' => 1,
                'name' => json_encode(['ar' => 'عدد غرف النوم', 'en' => 'Number of Bedrooms']),
                'type' => 'numeric',
                'is_required' => true,
            ],
            [
                'primary_amenity_id' => 1,
                'name' => json_encode(['ar' => 'عدد الأسرة المفردة', 'en' => 'Number of Single Beds']),
                'type' => 'numeric',
                'is_required' => true,
            ],
            [
                'primary_amenity_id' => 1,
                'name' => json_encode(['ar' => 'عدد الأسرة الماستر', 'en' => 'Number of Master Beds']),
                'type' => 'numeric',
                'is_required' => true,
            ],
            // المجالس
            [
                'primary_amenity_id' => 2,
                'name' => json_encode(['ar' => 'مجلس رئيسي', 'en' => 'Main Hall Capacity']),
                'type' => 'numeric',
                'is_required' => true,
            ],
            [
                'primary_amenity_id' => 2,
                'name' => json_encode(['ar' => 'مجلس إضافي', 'en' => 'Extra Hall Capacity']),
                'type' => 'numeric',
                'is_required' => false,
            ],
            [
                'primary_amenity_id' => 2,
                'name' => json_encode(['ar' => 'جلسة خارجية', 'en' => 'Outdoor Seating Capacity']),
                'type' => 'numeric',
                'is_required' => false,
            ],
            [
                'primary_amenity_id' => 2,
                'name' => json_encode(['ar' => 'ملحق خارجي', 'en' => 'Outdoor Annex Capacity']),
                'type' => 'numeric',
                'is_required' => false,
            ],
            // المسابح
            [
                'primary_amenity_id' => 3,
                'name' => json_encode(['ar' => 'نوع المسبح', 'en' => 'Pool Type']),
                'type' => 'select',
                'is_required' => true,
            ],
            [
                'primary_amenity_id' => 3,
                'name' => json_encode(['ar' => 'عمق المسبح (من)', 'en' => 'Pool Depth (From)']),
                'type' => 'numeric',
                'is_required' => true,
            ],
            [
                'primary_amenity_id' => 3,
                'name' => json_encode(['ar' => 'عمق المسبح (إلى)', 'en' => 'Pool Depth (To)']),
                'type' => 'numeric',
                'is_required' => true,
            ],
            [
                'primary_amenity_id' => 3,
                'name' => json_encode(['ar' => 'أبعاد المسبح', 'en' => 'Pool Dimensions']),
                'type' => 'dimension',
                'is_required' => true,
            ],
            [
                'primary_amenity_id' => 3,
                'name' => json_encode(['ar' => 'المسبح داخلى (يقع داخل المبنى)', 'en' => 'Indoor Pool']),
                'type' => 'boolean',
                'is_required' => false,
            ],
            [
                'primary_amenity_id' => 3,
                'name' => json_encode(['ar' => 'يوجد حاجز للمسبح', 'en' => 'Pool Barrier']),
                'type' => 'boolean',
                'is_required' => false,
            ],
            [
                'primary_amenity_id' => 3,
                'name' => json_encode(['ar' => 'يوجد ألعاب مائية بالمسبح', 'en' => 'Water Games']),
                'type' => 'boolean',
                'is_required' => false,
            ],
            [
                'primary_amenity_id' => 3,
                'name' => json_encode(['ar' => 'يوجد تدفئة بالمسبح', 'en' => 'Heating']),
                'type' => 'boolean',
                'is_required' => false,
            ],
            [
                'primary_amenity_id' => 3,
                'name' => json_encode(['ar' => 'المسبح مفرغ و لا يوجد يه ماء', 'en' => 'Empty Pool']),
                'type' => 'boolean',
                'is_required' => false,
            ],
            // المطابخ
            [
                'primary_amenity_id' => 4,
                'name' => json_encode(['ar' => 'عدد كراسي طاولة الطعام', 'en' => 'Number of Dining Chairs']),
                'type' => 'numeric',
                'is_required' => true,
            ],
            [
                'primary_amenity_id' => 4,
                'name' => json_encode(['ar' => 'مرافق المطبخ', 'en' => 'Kitchen Amenities']),
                'type' => 'multiselect',
                'is_required' => false,
            ],
            // دورات المياه
            [
                'primary_amenity_id' => 5,
                'name' => json_encode(['ar' => 'عدد دورات المياه', 'en' => 'Number of Bathrooms']),
                'type' => 'numeric',
                'is_required' => true,
            ],
            [
                'primary_amenity_id' => 5,
                'name' => json_encode(['ar' => 'مرافق دورات المياه', 'en' => 'Bathroom Amenities']),
                'type' => 'multiselect',
                'is_required' => false,
            ],
        ]);


        $primaryAmenityId = SubAmenity::where('name->ar', 'مرافق المطبخ')->first()->id;
        $primaryAmenityId = SubAmenity::where('name->ar', 'مرافق دورات المياه')->first()->id;


        $options = [
            ['ar' => 'ثلاجة', 'en' => 'Refrigerator'],
            ['ar' => 'أواني طبخ', 'en' => 'Cooking Utensils'],
            ['ar' => 'آلة قهوة', 'en' => 'Coffee Machine'],
            ['ar' => 'غلاية', 'en' => 'Kettle'],
            ['ar' => 'فريزر', 'en' => 'Freezer'],
            ['ar' => 'فرن', 'en' => 'Oven'],
            ['ar' => 'مايكروويف', 'en' => 'Microwave'],
        ];

        foreach ($options as $option) {
            SubAmenityOption::create([
                'sub_amenity_id' => $primaryAmenityId,
                'name' => $option,
            ]);
        }


        $primaryAmenityId = SubAmenity::where('name->ar', 'مرافق دورات المياه')->first()->id;

        $options = [
            ['ar' => 'دش', 'en' => 'Shower'],
            ['ar' => 'بانيو / حوض استحمام', 'en' => 'Bathtub'],
            ['ar' => 'جاكوزي', 'en' => 'Jacuzzi'],
            ['ar' => 'ساونا', 'en' => 'Sauna'],
            ['ar' => 'سباير', 'en' => 'Bidet'],
            ['ar' => 'رداء حمام', 'en' => 'Bathrobe'],
            ['ar' => 'شامبو', 'en' => 'Shampoo'],
            ['ar' => 'صابون', 'en' => 'Soap'],
            ['ar' => 'منديل', 'en' => 'Towel'],
        ];


        foreach ($options as $option) {
            SubAmenityOption::create([
                'sub_amenity_id' => $primaryAmenityId,
                'name' => $option,
            ]);
        }

    }
}
