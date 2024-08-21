<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Traits\UploadTrait;



class BookingCondition extends Model
{
    use HasFactory,HasTranslations,UploadTrait;
    public $translatable = ['name','desc'];

    protected $fillable = ['name','desc','icon'];

    protected function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }

    public function setIconAttribute($value)
    {
        if($value){
          return $this->attributes['icon'] = $this->StoreFile('BookingCondition' , $value);
        }
    }

    public function getIconAttribute($value)
    {
        return asset('storage/'.$value);
    }

}
