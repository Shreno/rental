<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Traits\UploadTrait;

class City extends Model
{
    use HasFactory , HasTranslations , UploadTrait;

    public $translatable = ['name','desc'];

    protected $fillable = ['name' , 'image'];

    public function neighborhoods()
    {
        return $this->hasMany(Neighborhood::class);
    }
    
    protected function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function setImageAttribute($value)
    {
        if($value){
          return $this->attributes['image'] = $this->StoreFile('cities' , $value);
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
