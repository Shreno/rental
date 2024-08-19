<?php

namespace App\Models;

use App\Traits\UploadTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Neighborhood extends Model
{
    use HasFactory , HasTranslations , UploadTrait;

    public $translatable = ['name' ];

    protected $fillable = ['name' , 'image','city_id'];

    
    public function city(){
        return $this->belongsTo(City::class);
    }

    protected function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }

    public function setImageAttribute($value)
    {
        if($value){
          return $this->attributes['image'] = $this->StoreFile('banners' , $value);
        }
    }

    public function getImageAttribute($value)
    {
        if($value)
        {
            return asset('storage/'.$value);
        }
        return null;
    }
}
