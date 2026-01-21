<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}
