<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\BookingCondition;
use App\Repositories\IBookingConditionRepository;
use App\Requests\dashboard\CreateUpdateBookingConditionRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


use Illuminate\Support\Facades\Storage;

class BookingConditionController extends Controller
{
    private $BookingConditionRepository;

    public function __construct(IBookingConditionRepository $BookingConditionRepository){

        $this->BookingConditionRepository = $BookingConditionRepository;
       
    }


    public function index()
    {
        $bookingConditions = $this->BookingConditionRepository->getAll();
        return view('dashboard.bookingCondition.index' , compact('bookingConditions'));
    }

    public function create()
    {
        return view('dashboard.bookingCondition.create');
    }

    public function store(request $request)
    {
        $data = $request->validate([
            'name.ar' => 'required|string|max:191|unique:booking_conditions,name->ar',
            'name.en' => 'required|string|max:191|unique:booking_conditions,name->en',
            'desc.ar'         => 'nullable|string|max:191',
            'desc.en'         => 'nullable|string|max:191',
        ]);
        
        BookingCondition::create($data);
        return response()->json();
    }


    public function edit($id)
    {
        $bookingCondition = $this->BookingConditionRepository->findOne($id);
        return view('dashboard.bookingCondition.create' , compact('bookingCondition'));
    }

    public function update(request $request , $id)
    {
        $bookingCondition = BookingCondition::findOrFail($id);
        $data = $request->validate([
            'name.ar' => [
                'required',
                'string',
                'max:191',
                Rule::unique('booking_conditions', 'name->ar')->ignore($bookingCondition->id),
            ],
            'name.en' => [
                'required',
                'string',
                'max:191',
                Rule::unique('booking_conditions', 'name->en')->ignore($bookingCondition->id),
            ],
            'desc.ar'         => 'nullable|string|max:191',
            'desc.en'         => 'nullable|string|max:191',
        ]);

        $bookingCondition->update($data);
        return response()->json();
    }


    public function destroy($id)
    {
        $this->BookingConditionRepository->forceDelete($id);
        return response()->json();

    }

    
    public function deleteAll(Request $request) {
        $requestIds = json_decode($request->data);
    
        foreach ($requestIds as $id) {
          $ids[] = $id->id;
        }
        if ($this->BookingConditionRepository->deleteForceWhereIn('id', $ids)) {
          return response()->json('success');
        } else {
          return response()->json('failed');
        }
    }

}