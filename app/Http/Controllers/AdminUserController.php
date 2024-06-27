<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AdminUserController extends Controller
{
    public function AdminLogout(){
        Auth::logout();
        return Redirect()->route('login');
    }

    public function UserProfile(){

        $id = Auth::user()->id;
        $user = User::find($id);

        return view('backend.user.user_profile', compact('user'));
    }

    public function UserProfileEdit(){
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('backend.user.user_profile_edit', compact('user'));
    }

    public function UserProfileStore(Request $request){

    	$data = User::find(Auth::user()->id);
    	$data->name = $request->name;
    	$data->email = $request->email;

    	if ($request->file('profile_photo_path')) {
    		$file = $request->file('profile_photo_path');
    		@unlink(public_path('upload/user_images/'.$data->profile_photo_path));
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/user_images'),$filename);
    		$data['profile_photo_path'] = $filename;
    	}
    	$data->save();

    	$notification = array(
    		'message' => 'User Profile Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('user.profile')->with($notification);
    }

    public function UserChangePassword(){
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('backend.user.change_password', compact('user'));
    }

    public function UserPasswordUpdate(Request $request){

        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;

        if(Hash::check($request->oldpassword, $hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            return redirect()->route('admin.logout');
        } else {
            return redirect()->back();
        }
    }
}
