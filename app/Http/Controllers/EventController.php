<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Organizer;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index(){
        $events=null;
        if(Auth::user()->role ==='admin'){
            $events=Event::all();
        }
        else{
        $organizer=Auth::user()->profile->id;
        $events=Event::where('profile_id',$organizer)->get();
        }

        // return $events;
        return view('admin.event.event', compact('events'));
    }

    public function create()
    {
        $venues=Venue::all();
        $categories=Category::all();
        $organizers=User::where('role','organizer')->get();
        return view('admin.event.create_event', compact('venues', 'categories','organizers'));
    }

    public function store(Request $request)
    {
        $event=new Event();
        $request->validate(
            [
                "event_name"=>"required",
                "description"=>"required",
                "date"=>"required",
                "venue"=>"required",
                "category"=>"required",
                "price"=>"required",
                "organizer_id"=>'required',
                "status"=>"in:published,unpublished",
                "image"=>"nullable|image|mimes:jpg,jpeg,png,webp|max:2048",
            ]);
        
        $imagePath=null;
        if($request->hasFile("image")){
            $imagePath=$request->file('image')->store('event_image', 'public');
        }
        if($request->status){
            $event->status=$request->satus;
        }
        else{
            $event->status="unpublished";
        }

        $profileId=null;
        if (Auth::user()->role === 'admin') {
        $profileId = $request->organizer_id;
        } else {
        $profileId = Auth::user()->profile->id;
        }

        $event->name=$request->event_name;
        $event->description=$request->description;
        $event->date=$request->date;
        $event->venue_id=$request->venue;
        $event->category_id=$request->category;
        $event->price=$request->price;
        $event->profile_id=$profileId;
        $status=null;
        if($request->status)
        {
            $status=$request->status;
        }
        else
        {
            $status="unpublished";
        }
        $event->status=$status;
        $event->image=$imagePath;
        $event->save();
        return redirect(route('event.index'))->with('success','Event created successfully');
    }

    public function edit($id){
        $event=Event::findOrFail($id);
        $venues=Venue::all();
        $categories=Category::all();
        return view('admin.event.edit_event', compact('venues','categories','event'));
    }

    public function update(Request $request, $id){
        $event=Event::findOrFail($id);
        $request->validate(    [
                "event_name"=>"required",
                "description"=>"required",
                "date"=>"required",
                "venue"=>"required",
                "category"=>"required",
                "price"=>"required",
                "status"=>"in:published,unpublished",
                "image"=>"nullable|image|mimes:jpg,jpeg,png,webp|max:2048",
            ]);

        $imagePath=null;
        if($request->hasFile("image")){
            $imagePath=$request->file('image')->store('event_image', 'public');
        }
        
        $event->name=$request->event_name;
        $event->description=$request->description;
        $event->date=$request->date;
        $event->venue_id=$request->venue;
        $event->category_id=$request->category;
        $status=null;
        if($request->status)
        {
            $status=$request->status;
        }
        else
        {
            $status="unpublished";
        }
        $event->status=$status;
        $event->price=$request->price;
        if($imagePath){
            $event->image=$imagePath;
        }
        $event->update();
        return redirect(route('event.index'))->with('update_message','Event updated successfully');
    }

    public function destroy($id){
        $event=Event::findOrFail($id);
        $event->delete();
        return redirect(route('event.index'))->with('delete_message','Event deleted successfully');
    }

    public function event_index()
    {
        $events=Event::where('date','>', now())->where('status','published')->get();
        return view('frontend.home', compact('events'));
    }

    public function event_detail($id)
    {
        $event=Event::findOrFail($id);
        $tickets_sold=Ticket::where('event_id',$id)->sum('quantity');

        
        return view('frontend.detail', compact('event','tickets_sold'));
    }

    public function all_event_index()
    {
        $events=Event::where('status','published')->get();
        return view('frontend.event', compact('events'));
    }

    
}
