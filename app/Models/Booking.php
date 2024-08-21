<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;


    public function property()
    {
        return $this->belongsTo(Property::class);
    }
    public function owner()
    {
        return $this->belongsTo(User::class,'owner_id');
    }
    public function client()
    {
        return $this->belongsTo(User::class,'client_id');
    }
   

}
