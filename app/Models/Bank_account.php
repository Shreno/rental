<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank_account extends Model
{
    use HasFactory;
    protected $fillable = ['bank_id' , 'user_id','account_number','iban'];

    public function user()
    {
        return $this->belongsTo(user::class);
    }
    public function bank()
    {
        return $this->belongsTo(bank::class);
    }

}
