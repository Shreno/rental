<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UploadTrait;
use Spatie\Translatable\HasTranslations;
class KitchenAttachment extends Model
{
    use HasFactory , UploadTrait;
    public $translatable = ['name'];
    protected $guarded = [];

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
        return asset('storage/'.$value);
    }
}
