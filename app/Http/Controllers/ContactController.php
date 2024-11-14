<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        Contact::create([
            'user_id' => Auth::user()->id,
            'message' => $request->message,
        ]);

        return redirect()->route('profile.queries')->with('success', 'Your query has been raised successfully!');
    }
}
