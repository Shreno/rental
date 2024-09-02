<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UploadTrait;
use Spatie\Translatable\HasTranslations;


class Property_Sub_Amenity extends Model
{
    use HasFactory , UploadTrait ;
    protected  $table="Property_Sub_Amenity";

    protected $fillable = ['property_id' , 'sub_amenity_id' , 'number'];



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
        return $this->belongsTo(SubAmenity::class,'sub_amenity_id');
    }
}
