<?php

namespace App\Repositories\Eloquent;

use App\Models\Bank;
use App\Repositories\IBankRepository;

class BankRepository extends BaseRepository implements IBankRepository
{
    public function __construct()
    {
        $this->model = new Bank();
    }
    
}