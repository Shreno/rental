<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\IClientRepository;

class ClientRepository extends BaseRepository implements IClientRepository
{
    public function __construct()
    {
        $this->model = new User();
    }
    public function AllUsers()
    {
       return $this->model->where('user_type',2)->latest()->get();
    }
    
    
}
