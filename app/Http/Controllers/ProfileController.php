<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function details()
    {
        return view('profile.details');
    }

    public function orders()
    {
        $orders = Auth::user()->orders()->with('orderItems.product')->get();
        return view('profile.orders', compact('orders'));
    }

    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        // Validate and update user details
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'address' => 'nullable|string|max:255',
            // Add other fields as necessary
        ]);

        $user = User::find(Auth::id()); // Fetch the user from the database
        $user->fill($request->only(['name', 'email', 'address'])); // Ensure only the fillable fields are updated
        $user->save();


        return redirect()->route('profile.details')->with('success', 'Profile updated successfully.');
    }

    public function password()
    {
        return view('profile.password');
    }

    public function updatePassword(Request $request)
    {
        // Validate the password fields
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::find(Auth::id());

        // Check if the current password matches
        if (!Hash::check($request->current_password, $user->password)) {
            flash()->error('The current password is incorrect.');
            return back();
        }

        // Update the password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('profile.details')->with('success', 'Password updated successfully.');
    }
    public function queries()
    {
        $queries = Contact::where('user_id', Auth::user()->id)->get();
        return view('profile.queries', compact('queries'));
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
