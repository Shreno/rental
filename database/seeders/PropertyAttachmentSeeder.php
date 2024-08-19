<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PropertyAttachmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('property_attachments')->insert([
            [
                'name' => json_encode(['ar' => 'غرفة نوم', 'en' => 'Attachment 1']),
                'image' => 'propertyattachments/' . Str::random(10) . '.jpg',
            ],
            [
                'name' => json_encode(['ar' => 'مجلس', 'en' => 'Attachment 2']),
                'image' => 'propertyattachments/' . Str::random(10) . '.jpg',
            ],
            [
                'name' => json_encode(['ar' => 'مسبح', 'en' => 'Attachment 3']),
                'image' => 'propertyattachments/' . Str::random(10) . '.jpg',
            ],
            [
                'name' => json_encode(['ar' => 'مطبخ', 'en' => 'Attachment 4']),
                'image' => 'propertyattachments/' . Str::random(10) . '.jpg',
            ],
            [
                'name' => json_encode(['ar' => 'مرفق 5', 'en' => 'Attachment 5']),
                'image' => 'propertyattachments/' . Str::random(10) . '.jpg',
            ],
        ]);
    }
}
