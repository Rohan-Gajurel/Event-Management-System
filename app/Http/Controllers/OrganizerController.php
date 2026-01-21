<?php

namespace App\Http\Controllers;

use App\Models\Organizer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganizerController extends Controller
{
    //
    public function index(){
        $organizers=Organizer::all();
        $user=User::all();
        return view('admin.organizer.organizer', compact('organizers'));
    }

    public function front(){
        return view('frontend.organizer');
    }

    public function create(){
        $users=User::all();
        return view('admin.organizer.create_organizer', compact('users'));
    }

    public function store(Request $request){
        $organizer=new Organizer();
        $request->validate([
            "type"=>"required|in:individual,company",
            "address"=>"required"
        ]);
        if($request->user_id){
            $organizer->user_id=$request->user_id;
        }
        else{
        $organizer->user_id=Auth::user()->id;}

        $organizer->type=$request->type;
        $organizer->address=$request->address;
        $organizer->save();
        return redirect(route('organizer.index'));
    }

    public function edit($id){
        $organizer=Organizer::findOrFail($id);
        return view('admin.organizer.edit_organizer',compact('organizer'));
    }

    public function update(Request $request, $id){
        $organizer=Organizer::findOrFail($id);
        $request->validate([
            "type"=>"required|in:individual,company",
            "address"=>"required"
        ]);
        if($request->user_id){
            $organizer->user_id=$request->user_id;
        }
        else{
        $organizer->user_id=Auth::user()->id;}

        $organizer->type=$request->type;
        $organizer->address=$request->address;
        $organizer->save();
        return redirect(route('organizer.index'));

    }
}
