<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Repositories\IClientRepository;
use App\Models\Booking;



use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $clientRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(IClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;

        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(request $request)
    {
       
            // Fetch counts for active, inactive, and refused properties
            $property_Active = Property::where('user_id', auth()->user()->id)->where('is_active', 1)->count();
            $property_Inctive = Property::where('user_id', auth()->user()->id)->where('is_active', 0)->count();
            $property_refused = Property::where('user_id', auth()->user()->id)->where('is_active', 2)->count();
            $bookingcount = Booking::where('owner_id', auth()->user()->id)->count();
        
            // Handle search case
            if ($request->search == 'search') {
                $search_input = $request->search_input;
                $from = $request->from_date;
                $to = $request->to_date;
                $status = $request->status;
        
                $properties = Property::where('user_id', auth()->user()->id);
        
                // Apply filters based on date range
                if ($from != null) {
                    $properties = $properties->where('created_at', '>=', $from);
                }
                if ($to != null) {
                    $properties = $properties->where('created_at', '<=', $to);
                }
        
                // Filter by status
                if ($status != null) {
                    $properties = $properties->where('is_active', $status);
                }
        
                // Search within title and description for both languages (ar and en)
                if ($search_input != null) {
                    $properties = $properties->where(function ($query) use ($search_input) {
                        $query->where('title->ar', 'LIKE', "%{$search_input}%")
                              ->orWhere('title->en', 'LIKE', "%{$search_input}%")
                              ->orWhere('description->ar', 'LIKE', "%{$search_input}%")
                              ->orWhere('description->en', 'LIKE', "%{$search_input}%");
                    });
                }
        
                // Get the total count of filtered properties
                $totalPropertiesCount = $properties->count();
        
                // Paginate the filtered results
                $properties = $properties->latest()->paginate(10);
        
                return view('client.home', compact('totalPropertiesCount', 'properties', 'property_Active', 'property_Inctive', 'property_refused', 'bookingcount', 'search_input', 'from', 'to', 'status'));
        
            } else {
                // If no search, get total properties count
                $totalPropertiesCount = Property::where('user_id', auth()->user()->id)->count();
        
                // Get paginated properties
                $properties = Property::where('user_id', auth()->user()->id)->latest()->paginate(10);
            }
        
            return view('client.home', compact('totalPropertiesCount', 'properties', 'property_Active', 'property_Inctive', 'property_refused', 'bookingcount'));
        }
    
    public function profile (){
        return view('client.profile');

    }
    public function update_profile($id,request $request){
        $data = $request->all();

        $user = $this->clientRepository->findOne($id);
        if($request->has('image')){
            $data['image'] = $request->file('image')->store('dashboard/uploads');
        }

        $updated = $this->clientRepository->update($data, $id);
        return redirect()->route('client.profile');

    }
    public function SetLanguage($lang)
    {
    
        if ( in_array( $lang, [ 'ar', 'en' ] ) ) {

            if ( session() -> has( 'lang' ) )
                session() -> forget( 'lang' );

            session() -> put( 'lang', $lang );

        } else {
            if ( session() -> has( 'lang' ) )
                session() -> forget( 'lang' );

            session() -> put( 'lang', 'ar' );
        }
        return back();
    }
}
