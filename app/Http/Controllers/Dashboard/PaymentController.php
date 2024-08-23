<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Repositories\IPaymentRepository;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    private $PaymentRepository;

    public function __construct(IPaymentRepository $PaymentRepository){

        $this->PaymentRepository = $PaymentRepository;
       
    }


    public function index()
    {
        $Payments = $this->PaymentRepository->getAll();
        return view('dashboard.payments.index' , compact('Payments'));
    }

    public function create()
    {
        return view('dashboard.payments.create');
    }

    public function edit( $id)
    {
        $payment = Payment::findOrFail($id);
       
        $payment->update(['status'=>'completed']);
        return redirect()->route('payments.index')->with('success', 'paied is successfully.');
    }


    public function destroy($id)
    {
        $this->PaymentRepository->forceDelete($id);
        return response()->json();

    }

    
    public function deleteAll(Request $request) {
        $requestIds = json_decode($request->data);
    
        foreach ($requestIds as $id) {
          $ids[] = $id->id;
        }
        if ($this->PaymentRepository->deleteForceWhereIn('id', $ids)) {
          return response()->json('success');
        } else {
          return response()->json('failed');
        }
    }

}