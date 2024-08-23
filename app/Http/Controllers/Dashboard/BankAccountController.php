<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Bank;
use App\Models\Bank_account;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


use Illuminate\Support\Facades\Storage;

class BankAccountController extends Controller
{
    private $BookingConditionRepository;

    public function __construct( ){

       
    }


    public function index()
    {
        $bank_accounts=Bank_account::all();
        return view('dashboard.bank_accounts.index' , compact('bank_accounts'));
    }

    public function create()
    {
        $banks=Bank::where('is_active',1)->get();
        $users=User::where('user_type',2)->get();


        return view('dashboard.bank_accounts.create',compact('banks','users'));
    }

    public function store(request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'bank_id' => 'required|exists:banks,id',
            'account_number' => 'required|string|max:255',
            'iban' => 'nullable|string|max:255',
        ]);

        
        
        Bank_account::create($data);
        return redirect()->route('bank-accounts.index')->with('success', 'bank account created successfully.');
    }


    public function edit($id)
    {
        $bank_account = Bank_account::find($id);
        $banks=Bank::where('is_active',1)->get();
        $users=User::where('user_type',2)->get();


        return view('dashboard.bank_accounts.create',compact('banks','users','bank_account'));
    }

    public function update(request $request , $id)
    {
        $bank_account = Bank_account::findOrFail($id);
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'bank_id' => 'required|exists:banks,id',
            'account_number' => 'required|string|max:255',
            'iban' => 'nullable|string|max:255',
        ]);
        

        // if($request->has('icon')){
        //     $data['icon'] = $request->file('icon')->store('BookingCondition');
        // }
        $bank_account->update($data);
        return redirect()->route('bank-accounts.index')->with('success', 'bank account updated successfully.');
    }


    public function destroy($id)
    {
        $bank_account = Bank_account::findOrFail($id);
        $bank_account->delete();

        return response()->json();

    }

    
    public function deleteAll(Request $request) {
        $requestIds = json_decode($request->data);
    
        foreach ($requestIds as $id) {
          $bank_account = Bank_account::findOrFail($id);
          $bank_account->delete();
        }
          return response()->json('success');
        
    }

}