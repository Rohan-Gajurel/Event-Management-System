<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function index(){
        $users=User::all();
        return view('admin.user.user', compact('users'));
    }

    public function edit($id){
        $user=User::findOrFail($id);
        return view('admin.user.edit_user', compact('user'));
    }

    public function update(Request $request, $id){
        $user=User::findOrFail($id);
        $request->validate([
            "role"=>"required|in:organizer,participant,admin",
        ]);
        $user->role=$request->role;
        $user->update();
        return redirect(route('user.index'))->with('update_message','User updated successfully');
    }

    public function destroy($id)
    {
        $user=User::findOrFail($id);
        $user->delete();
        return redirect(route('user.index'))->with('delete_message','User deleted successfully');


    }

    public function role_show(){
        return view('frontend.role');
    }

    public function submit_role(Request $request){
        $request->validate([
            'role'=>['required', 'in:organizer,participant'],
        ]);
        
        $user_id=Auth::user()->id;
        $user=User::findOrFail($user_id);
        $user->role=$request->role;
        $user->save();

        if($user->role === "organizer"){
            return redirect()->route('organizer.form');
        }
        else{
            return redirect()->intended(route('event_list', absolute: false));
        }



    }
}
