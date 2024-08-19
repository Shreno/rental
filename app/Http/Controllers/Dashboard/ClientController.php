<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\IClientRepository;
use App\Requests\dashboard\CreateUpdateClientRequest;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    private $clientRepository;

    public function __construct(IClientRepository $clientRepository){

        $this->clientRepository = $clientRepository;
       
    }


    public function index()
    {
        $clients = $this->clientRepository->AllUsers();
        return view('dashboard.clients.index' , compact('clients'));
    }

    public function create()
    {
        return view('dashboard.clients.create');
    }


    // 
    public function store(CreateUpdateClientRequest $request)
    {
        $data = $request->all();
        $data['user_type'] = 2 ;


        $data['is_active'] = $request->is_active == 'on' ? '1' : '0';
    
        if($request->has('image')){
            $data['image'] = $request->file('image')->store('dashboard/uploads');
        }
        $user = $this->clientRepository->create($data);

       
         return response()->json();
    }



    // 


    public function edit($id)
    {
        $client = $this->clientRepository->findOne($id);
        return view('dashboard.clients.create' , compact('client'));
    }

    public function update(CreateUpdateClientRequest $request , $id)
    {

        $user = $this->clientRepository->findOne($id);
        $data['is_active'] = $request->is_active == 'on' ? '1' : '0';
        if($request->has('image')){
            $data['image'] = $request->file('image')->store('dashboard/uploads');
        }

        $updated = $this->clientRepository->update($data, $id);

        return response()->json();
    }


    public function destroy($id)
    {
        $this->clientRepository->forceDelete($id);
        return response()->json();

    }

    
    public function deleteAll(Request $request) {
        $requestIds = json_decode($request->data);
    
        foreach ($requestIds as $id) {
          $ids[] = $id->id;
        }
        if ($this->clientRepository->deleteForceWhereIn('id', $ids)) {
          return response()->json('success');
        } else {
          return response()->json('failed');
        }
    }

}