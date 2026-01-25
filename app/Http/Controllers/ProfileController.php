<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Profile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    // /**
    //  * Display the user's profile form.
    //  */
    // public function edit(Request $request): View
    // {
    //     return view('profile.edit', [
    //         'user' => $request->user(),
    //     ]);
    // }

    // /**
    //  * Update the user's profile information.
    //  */
    // public function update(ProfileUpdateRequest $request): RedirectResponse
    // {
    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();

    //     return Redirect::route('profile.edit')->with('status', 'profile-updated');
    // }

    // /**
    //  * Delete the user's account.
    //  */
    // public function destroy(Request $request): RedirectResponse
    // {
    //     $request->validateWithBag('userDeletion', [
    //         'password' => ['required', 'current_password'],
    //     ]);

    //     $user = $request->user();

    //     Auth::logout();

    //     $user->delete();

    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();

    //     return Redirect::to('/');
    // }
    public function index(){
        $user = Auth::user();
        $profile = $user->profile;
        return view('frontend.profile.profile',compact('user','profile'));
    }

    public function create(){
        return view('frontend.profile.create');
    }

    public function store(Request $request){
        $request->validate(
            [
                'role' => 'required|in:participant,organizer',  
                "address"=>"required",
                "type"=>"required|in:individual,company",
                "image"=>"nullable|image|mimes:jpg,jpeg,png,webp|max:2048",
            ]);


            $user = Auth::user();
            $user->role  = $request->role;
            $user->update();


            $profile=new Profile();
            $imagePath=null;
            if($request->hasFile("image")){
            $imagePath=$request->file('image')->store('profile_image', 'public');
            }
            $profile->address=$request->address;
            $profile->type=$request->type;
            
            if($request->company_name){
            $profile->company_name=$request->company_name;
            }
            $profile->profile_image=$imagePath;
            $profile->user_id=Auth::user()->id;
            $profile->save();

            return redirect(route('user_profile'))->with('success','Profile created successfully');
    }

    public function edit(){
        $user = Auth::user();
        $profile = $user->profile;
        return view('frontend.profile.edit',compact('user','profile'));
    }

    public function update(Request $request)
{
    $request->validate([
        'username' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
        'role' => 'required|in:participant,organizer',
        'address' => 'required|string|max:255',
        'type' => 'required|in:individual,company',
        'company_name' => 'nullable|string|max:255',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $user = Auth::user();
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
        ->route('user_profile')
        ->with('success', 'Profile updated successfully');
}


}
