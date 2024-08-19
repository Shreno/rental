<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UploadTrait;
use Spatie\Translatable\HasTranslations;

class PrimaryAmenity extends Model
{
    use HasFactory , UploadTrait , HasTranslations;
    public $translatable = ['name'];
    protected $guarded = [];


    protected function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }

    public function setIconAttribute($value)
    {
        if($value){
          return $this->attributes['icon'] = $this->StoreFile('amenities' , $value);
        }
    }

    public function getIconAttribute($value)
    {
        return asset('storage/'.$value);
    }

    public function subAmenities()
    {
        return $this->hasMany(SubAmenity::class, 'primary_amenity_id');
    }
}
