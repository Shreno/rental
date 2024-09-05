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
    public function index()
    {
        $property_Active = Property::where('user_id', auth()->user()->id)->latest()->where('is_active',1)->count();
        $property_Inctive = Property::where('user_id', auth()->user()->id)->latest()->where('is_active',0)->count();

        $property_refused= Property::where('user_id', auth()->user()->id)->latest()->where('is_active',2)->count();
        $bookingcount=Booking::where('owner_id',auth()->user()->id)->count();



        $properties = Property::where('user_id', auth()->user()->id)
        ->latest()
        ->paginate(10);
        return view('client.home',compact('properties','property_Active','property_Inctive','property_refused','bookingcount'));
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
