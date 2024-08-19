<?php

namespace App\Repositories\Eloquent;

use App\Models\BookingCondition;
use App\Repositories\IBookingConditionRepository;

class BookingConditionRepository extends BaseRepository implements IBookingConditionRepository
{
    public function __construct()
    {
        $this->model = new BookingCondition();
    }
    
}