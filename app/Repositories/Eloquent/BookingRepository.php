<?php

namespace App\Repositories\Eloquent;

use App\Models\Booking;
use App\Repositories\IBookingRepository;

class BookingRepository extends BaseRepository implements IBookingRepository
{
    public function __construct()
    {
        $this->model = new Booking();
    }

    public function booking_client()
    {
       return $this->model->where('owner_id',auth()->user()->id)->latest()->paginate(10);
    }
    
}