<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guiders;
use App\Models\Destination;
use App\Models\Package;
use App\Models\PaidBooking;


class AdminController extends Controller
{
    public function addguiders(){
        $data=guiders::all();
        return view('admin.guiders',compact('data'));
    }
    public function addguider(Request $request){
        $data=new guiders;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->address=$request->address;
        $data->contact=$request->contact;
        $data->experience=$request->experience;
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('images',$imagename);
        $data->image=$imagename;
        $data->save();
        return redirect()->back();

    }
    public function destinations(){
        $data=destination::all();
       
        return view('admin.destinations',compact('data'));
    }
    public function add_destination(Request $request){
        $data=new destination;
        $data->country=$request->country;
        $data->location_url=$request->location;
        $data->city=$request->city;
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('images_des',$imagename);
        $data->location_image=$imagename;
        $data->save();
        return redirect()->back();


    }
    public function packages(){
        $data=destination::all();
        $package=package::all();
        return view('admin.package',compact('data','package'));
    }
    public function addpackage(Request $request){
        $data=new package;
        $data->city=$request->city;
        $data->price=$request->price;
        $data->person=$request->person;
        $data->day=$request->day;
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('images_package',$imagename);
        $data->image=$imagename;
        $data->save();
        return redirect()->back();

    }
    public function bookings(){
        $booking=paidBooking::all();
        return view('admin.booking',compact('booking'));


    }
    public function deletepackage($id){
        $delete=package::find($id);
        $delete->delete();
        return redirect()->back();
    }
    public function updatepackage($id){
        $update=package::find($id);
        $destination=destination::all();
        return view('admin.updatepackage',compact('update','destination'));
    }
    public function updatedpackage(Request $request,$id){
        $package=package::find($id);
        $package->city=$request->city;
        $package->day=$request->day;
        $package->price=$request->price;
        $package->person=$request->person;
        $image=$request->image;
        if($image){
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('images_package',$imagename);
        $package->image=$imagename;
        }
        $package->save();
        return redirect()->back();
    }
    public function deleteguider($id){
        $delete=guiders::find($id);
        $delete->delete();
        return redirect()->back();
    }
    public function updateguider($id){
        $update=guiders::find($id);
        return view('admin.updateguider',compact('update'));
    }
    public function updatedguider(Request $request,$id){
        $guider=guiders::find($id);
        $guider->name=$request->name;
        $guider->email=$request->email;
        $guider->address=$request->address;
        $guider->contact=$request->contact;
        $guider->experience=$request->experience;
        $image=$request->image;
        if($image){
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('images',$imagename);
        $guider->image=$imagename;
        }
        $guider->save();
        return redirect()->back();
    }
    public function deletelocation($id){
        $delete=destination::find($id);
        $delete->delete();
        return redirect()->back();
    }
    public function updatelocation($id){
        $update=destination::find($id);
        return view('admin.updatelocation',compact('update'));
    }
    public function updatedlocation(Request $request,$id){
        $destination=destination::find($id);
        $destination->country=$request->country;
        $destination->location_url=$request->location;
        $destination->city=$request->city;
        $image=$request->image;
        if($image){
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('images_des',$imagename);
        $destination->location_image=$imagename;
        }
        $destination->save();
        return redirect()->back();
    }
    public function dashboards()
    {
        return view('admin.home');
    }
}
