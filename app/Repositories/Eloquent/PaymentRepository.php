<?php

namespace App\Repositories\Eloquent;

use App\Models\Payment;
use App\Repositories\IPaymentRepository;

class PaymentRepository extends BaseRepository implements IPaymentRepository
{
    public function __construct()
    {
        $this->model = new Payment();
    }
    
}