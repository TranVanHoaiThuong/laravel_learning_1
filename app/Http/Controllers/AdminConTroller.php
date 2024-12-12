<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminConTroller extends Controller
{
    public function AdminDashboard() {
        return view('admin.index', []);
    }

    public function AdminLogout(Request $request): RedirectResponse {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function AdminLogin() {
        return view('admin.login');
    }

    public function AdminProfile(Request $request) {
        $id = Auth::user()->id;
        $profile = User::find($id);
        return view('admin.profile_view', compact('profile'));
    }

    public function AdminProfileStore(Request $request) {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if($file = $request->file('photo')) {
            @unlink(public_path('/upload/admin_images/' . $data->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data->photo = $filename;
        }
        $data->save();

        $notification = [
            'message' => 'Profile updated successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function AdminChangePassword() {
        $id = Auth::user()->id;
        $profile = User::find($id);
        return view('admin.change_password', compact('profile'));
    }

    public function AdminUpdatePassword(Request $request) {
        $request->validate([
            'newpassword' => 'required|confirmed' 
        ]);

        $oldpassword = $request->oldpassword;
        if(!Hash::check($oldpassword, auth()->user()->password)) {
            $notification = [
                'message' => 'Old password does not match!',
                'alert-type' => 'error'
            ];

            return redirect()->back()->with($notification);
        }

        User::where(['id' => auth()->user()->id])
            ->update(['password' => Hash::make($request->newpassword)]);
        
        $notification = [
            'message' => 'Password change successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
