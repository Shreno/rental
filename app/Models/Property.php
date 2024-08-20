<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Property extends Model
{
    use HasFactory , HasTranslations;
    protected $guarded = [];
    public $translatable = ['title','description'];

    protected function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function neighborhood()
    {
        return $this->belongsTo(Neighborhood::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function primaryAmenities()
    {
        return $this->belongsToMany(PrimaryAmenity::class, 'property_primary_amenity');
    }

    public function subAmenities()
    {
        return $this->belongsToMany(SubAmenity::class, 'property_sub_amenity');
    }

    public function propertyFeatures()
    {
        return $this->belongsToMany(PropertyFeature::class, 'property_property_feature');
    }

    public function propertyBookingConditions()
    {
        return $this->belongsToMany(BookingCondition::class, 'property_BookingCondition');
    }

    

    public function images()
    {
        return $this->hasMany(PropertyImage::class);
    }
}
