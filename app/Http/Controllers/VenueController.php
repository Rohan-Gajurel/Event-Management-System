<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;

class VenueController extends Controller
{
    public function index(){
        $venues=Venue::all();
        return view('admin.venue.venue', compact('venues'));
    }

    public function create()
    {
        return view('admin.venue.create_venue');
    }

    public function store(Request $request)
    {
        $venue=new Venue();
        $request->validate(
            [
                "name"=>"required",
                "address"=>"required",
            ]);
        
        $venue->name=$request->name;
        $venue->address=$request->address;
        $venue->save();
        return redirect(route('venue.index'))->with('success','Venue created successfully');
    }

    public function edit($id){
        $venue=Venue::findOrFail($id);
        return view('admin.venue.edit_venue', compact('venue'));
    }

    public function update(Request $request, $id){
        $venue=Venue::findOrFail($id);
        $request->validate(
            [
                "name"=>"required",
                "address"=>"required",
            ]);
        
        $venue->name=$request->name;
        $venue->address=$request->address;
        $venue->update();
        return redirect(route('venue.index'))->with('update_message','Venue updated successfully');
    }

    public function destroy($id){
        $venue=Venue::findOrFail($id);
        $venue->delete();
        return redirect(route('venue.index'))->with('delete_message','Venue deleted successfully');
    }


}
