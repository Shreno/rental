<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SubAmenity extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['name'];
    protected $guarded = [];

    protected $casts = [
        'is_required' => 'boolean',
    ];

    protected function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }

    public function amenity()
    {
        return $this->belongsTo(PrimaryAmenity::class, 'primary_amenity_id');
    }

    public function options()
    {
        return $this->hasMany(SubAmenityOption::class,'sub_amenity_id');
    }
}
