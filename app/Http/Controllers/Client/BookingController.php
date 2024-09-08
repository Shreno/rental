<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Repositories\IBookingRepository;
use App\Requests\dashboard\CreateUpdateClientRequest;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NotifyUser;

use Illuminate\Support\Facades\Storage;

class BookingController extends Controller
{
    private $bookingRepository;

    public function __construct(IBookingRepository $bookingRepository){

        $this->bookingRepository = $bookingRepository;
       
    }


    public function index()
    {
        $bookings = $this->bookingRepository->booking_client();
        return view('client.bookings.index' , compact('bookings'));
    }

   

    // 
  


    // 


  

  

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