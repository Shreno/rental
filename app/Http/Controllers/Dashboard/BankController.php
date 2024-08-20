<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Repositories\IBankRepository;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


use Illuminate\Support\Facades\Storage;

class BankController extends Controller
{
    private $BankRepository;

    public function __construct(IBankRepository $BankRepository){

        $this->BankRepository = $BankRepository;
       
    }


    public function index()
    {
        $banks = $this->BankRepository->getAll();
        return view('dashboard.banks.index' , compact('banks'));
    }

    public function create()
    {
        return view('dashboard.banks.create');
    }

    public function store(request $request)
    {
        $data = $request->validate([
            'name.ar' => 'required|string|max:191|unique:booking_conditions,name->ar',
            'name.en' => 'required|string|max:191|unique:booking_conditions,name->en',
        ]);
        
        Bank::create($data);
        return response()->json();
    }


    public function edit($id)
    {
        $bank = $this->BankRepository->findOne($id);
        return view('dashboard.banks.create' , compact('bank'));
    }

    public function update(request $request , $id)
    {
        $Bank = Bank::findOrFail($id);
        $data = $request->validate([
            'name.ar' => [
                'required',
                'string',
                'max:191',
                Rule::unique('banks', 'name->ar')->ignore($Bank->id),
            ],
            'name.en' => [
                'required',
                'string',
                'max:191',
                Rule::unique('banks', 'name->en')->ignore($Bank->id),
            ],
        ]);

        $Bank->update($data);
        return response()->json();
    }


    public function destroy($id)
    {
        $this->BankRepository->forceDelete($id);
        return response()->json();

    }

    
    public function deleteAll(Request $request) {
        $requestIds = json_decode($request->data);
    
        foreach ($requestIds as $id) {
          $ids[] = $id->id;
        }
        if ($this->BankRepository->deleteForceWhereIn('id', $ids)) {
          return response()->json('success');
        } else {
          return response()->json('failed');
        }
    }

}