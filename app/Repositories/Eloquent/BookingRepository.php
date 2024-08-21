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
    
}