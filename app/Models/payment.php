<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = ['booking_id' , 'paid_by' , 'owner_id' , 'amount','site_commission','owner_amount','status'];


    public function booking()
{
    return $this->belongsTo(Booking::class,'booking_id');
}

}




