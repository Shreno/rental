<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\IBookingRepository;
use App\Requests\dashboard\CreateUpdateClientRequest;
use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Storage;

class BookingController extends Controller
{
    private $bookingRepository;

    public function __construct(IBookingRepository $bookingRepository){

        $this->bookingRepository = $bookingRepository;
       
    }


    public function index()
    {
        $bookings = $this->bookingRepository->getAll();
        return view('dashboard.bookings.index' , compact('bookings'));
    }

    public function create()
    {
        return view('dashboard.bookings.create');
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
        $user = $this->bookingRepository->create($data);

       
         return response()->json();
    }



    // 


    public function edit($id)
    {
        $client = $this->bookingRepository->findOne($id);
        return view('dashboard.bookings.create' , compact('client'));
    }

    public function update(CreateUpdateClientRequest $request , $id)
    {
        $data = $request->all();

        $user = $this->bookingRepository->findOne($id);
        $data['is_active'] = $request->is_active == 'on' ? '1' : '0';
        if($request->has('image')){
            $data['image'] = $request->file('image')->store('dashboard/uploads');
        }

        $updated = $this->bookingRepository->update($data, $id);

        return response()->json();
    }


    public function destroy($id)
    {
        $this->bookingRepository->forceDelete($id);
        return response()->json();

    }

    
    public function deleteAll(Request $request) {
        $requestIds = json_decode($request->data);
    
        foreach ($requestIds as $id) {
          $ids[] = $id->id;
        }
        if ($this->bookingRepository->deleteForceWhereIn('id', $ids)) {
          return response()->json('success');
        } else {
          return response()->json('failed');
        }
    }

}