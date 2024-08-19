<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UploadTrait;

class PropertyImage extends Model
{
    use HasFactory , UploadTrait;
    protected $guarded = [];

    public function setImageAttribute($value)
    {
        if($value){
          if(is_string($value))
          {
              return $this->attributes['image'] = $value;
          }else{
            return $this->attributes['image'] = $this->StoreFile('properties' , $value);
          }
        }
    }

    public function getImageAttribute($value)
    {
        return asset('storage/'.$value);
    }
}
