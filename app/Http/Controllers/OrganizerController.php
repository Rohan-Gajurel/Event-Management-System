<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganizerController extends Controller
{
    //
    public function index(){
        $organizers=Profile::all();
        $user=User::all();
        return view('admin.organizer.organizer', compact('organizers'));
    }


    public function edit($id){
        $profile = Profile::findOrFail($id);   
        $user = $profile->user;                

        return view('admin.organizer.edit_organizer',compact('profile','user'));
    }

public function update(Request $request, $id)
{
    $request->validate([
        'username' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'role' => 'required|in:participant,organizer',
        'address' => 'required|string|max:255',
        'type' => 'required|in:individual,company',
        'company_name' => 'nullable|string|max:255',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);
    $profile = Profile::findOrFail($id);   
    $user = $profile->user; 
    $user->name  = $request->username;
    $user->email = $request->email;
    $user->role  = $request->role;
    $user->update();

    $profile = $user->profile ;
    if ($request->hasFile('image')) {
        $profile->profile_image = $request->file('image')
            ->store('profile_image', 'public');
    }

    $profile->address = $request->address;
    $profile->type = $request->type;
    $profile->company_name = $request->type === 'company'
        ? $request->company_name
        : null;

    $profile->update();

    return redirect()
        ->route('organizer.index')
        ->with('success', 'Profile updated successfully');
}

}
