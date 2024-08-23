<?php

namespace App\Http\Controllers\Dashboard;

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
        $users=User::where('user_type',2)->get();
        $propertys=Property::all();
        return view('dashboard.bookings.create',compact('users','propertys'));
    }


    // 
    public function store(Request $request)
    {
        

    // Validate and check for overlapping bookings
    $request->validate([
        'property_id' => 'required|exists:properties,id',
        'client_id' => 'required|exists:users,id',
        'start_date' => 'required|date|after_or_equal:today',
        'end_date' => 'required|date|after:start_date',
    ]);
    $property = Property::find($request->property_id);
    $client = User::find($request->client_id);
    $owner = $property->user_id;

    $startDate = Carbon::parse($request->start_date);
    $endDate = Carbon::parse($request->end_date);

    // Check for overlapping bookings
    $existingBooking = Booking::where('property_id', $property->id)
        ->where(function ($query) use ($startDate, $endDate) {
            $query->whereBetween('start_date', [$startDate, $endDate])
                  ->orWhereBetween('end_date', [$startDate, $endDate])
                  ->orWhere(function ($query) use ($startDate, $endDate) {
                      $query->where('start_date', '<=', $startDate)
                            ->where('end_date', '>=', $endDate);
                  });
        })
        ->exists();

    if ($existingBooking) {
        return redirect()->back()->withErrors('The selected dates overlap with an existing booking for this property.');
    }

    // Calculate total price
    $duration = $startDate->diffInDays($endDate);
    $totalPrice = $property->rate_per_day * $duration;
    $commission_percentage=Setting::where('key','site_commission')->first();

    // Create Booking
    $booking = Booking::create([
        'property_id' => $property->id,
        'client_id' => $client->id,
        'owner_id' => $owner,
        'start_date' => $startDate,
        'end_date' => $endDate,
        'total_price' => $totalPrice,
    ]);

    // Calculate payment amounts
    $siteCommission = $totalPrice * ($commission_percentage->value / 100);
    $ownerAmount = $totalPrice - $siteCommission;

    // Create Payment
    Payment::create([
        'booking_id' => $booking->id,
        'paid_by' => $client->id,
        'owner_id' => $owner,
        'amount' => $totalPrice,
        'site_commission' => $siteCommission,
        'owner_amount' => $ownerAmount,
        'status' => 'pending',
    ]);

    return redirect()->route('bookings.index')->with('success', 'Booking created successfully.');
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