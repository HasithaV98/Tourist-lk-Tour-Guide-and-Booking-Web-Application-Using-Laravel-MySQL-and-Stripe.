<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Destination;
use App\Models\Package;
use App\Models\Booking;
use App\Models\paidBooking;
use App\Models\Guiders;
use Session;
use Stripe;


class HomeController extends Controller
{
    public function index(){
        $data=destination::paginate(6);
        $package=Package::all();
        $guider=guiders::all();

        
        return view('user.home',compact('data','package','guider'));
    }
    
    public function redirect(){
        $data=destination::paginate(6);
        $package=Package::all();
        $guider=guiders::all();
        $usertype=Auth::user()->usertype;
        if($usertype=='1'){
            return view('admin.home');
        }else{
            return view('user.home',compact('data','package','guider'));
        }
        
    }
    public function booking(Request $request, $id)
    {
    if (Auth::id()) {
        $user = Auth::user();
        $userid = $user->id;
        $package = optional(Package::find($id))->first();
        $destination = optional(Destination::find($id))->first();
        if (!$package || !$destination) {
            return redirect()->back()->with('error', 'Package or Destination not found');
        }
        $booking = new Booking;
        $booking->name = $user->name;
        $booking->email = $user->email;
        $booking->destination = $package->city;
        $booking->user_id = $user->id;
        $booking->location_id = $destination->id;
        $booking->price = $package->price;
        $booking->day = $package->day;
        $booking->person = $package->person;
        $booking->save();
        return redirect()->back()->with('success', 'Booking successful');
    } else {
        return redirect('login');
        }
    }
    public function go_booking(){
        if(Auth::user()){
            $data=destination::all();
            return view('user.bookings',compact('data'));
        }
        else{
            return redirect('login');
        }
        
    }
    public function customized_booking(Request $request, $id)
{
    if (Auth::user()) {
        $user = Auth::user();
        $destination = Destination::find($id);

        if (!$destination) {
            return redirect()->back()->with('error', 'Destination not found');
        }

        // Calculate the price based on the number of days and persons
        $day = $request->input('day');
        $person = $request->input('person');
        $defaultPrice = 100;
        $price = $defaultPrice + ($day * 100) + ($person * 100);

        $booking = new Booking;
        $booking->name = $request->input('name');
        $booking->email = $request->input('email');
        $booking->date_time = $request->input('datetime');
        $booking->destination = $request->input('destination');
        $booking->request = $request->input('request');
        $booking->price = $price; // Set the calculated price
        $booking->day = $day;
        $booking->person = $person;
        $booking->user_id = $user->id;
        $booking->location_id = $destination->id;
        $booking->save();

        return redirect()->back();
    } 
    else {
        return redirect('login');
    }
    }
    public function my_bookings(){
        if(Auth::id()){
            $id=Auth::user()->id;
            $booking=booking::where('user_id','=',$id)->get();
            return view('user.my_bookings',compact('booking'));

        }
        else{
            return redirect('login');
        }
    }
    public function booking_cancel($id){
        $booking=booking::find($id);
        $booking->delete();
        return redirect()->back();
    }
    public function checkout(Request $request){
        $price=$request->price;
        return view('user.stripe',compact('price'));
    }
    public function stripePost(Request $request,$price)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $price * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for payment." 
        ]);
        $user=Auth::user();
        $userid=$user->id;
        $data=booking::where('user_id','=',$userid)->get();
        foreach($data as $data){
            $paidBooking=new paidBooking;
            $paidBooking->name=$data->name;
            $paidBooking->date_time=$data->date_time;
            $paidBooking->email=$data->email;
            $paidBooking->destination=$data->destination;
            $paidBooking->user_id=$data->user_id;
            $paidBooking->request=$data->request;
            $paidBooking->price=$data->price;
            $paidBooking->person=$data->person;
            $paidBooking->day=$data->day;
            $paidBooking->location_id=$data->location_id;
            $paidBooking->payment_status='Paid';
            
            $paidBooking->save();
            $booking_id=$data->id;
            $booking=booking::find($booking_id);
            $booking->delete();
        }
      
        Session::flash('success', 'Payment successful!');
              
        return back();
    }

}



    
    
    

