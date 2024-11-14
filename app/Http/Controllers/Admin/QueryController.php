<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact; // Assuming 'Contact' model handles user queries
use Illuminate\Support\Facades\Mail;

class QueryController extends Controller
{
    /**
     * Display a listing of queries.
     */
    public function index()
    {
        $queries = Contact::with('user')->paginate(10);
        return view('admin.queries.index', compact('queries'));
    }

    /**
     * Reply to a specific query.
     */
    public function reply(Request $request, $id)
    {
        $request->validate([
            'reply_message' => 'required|string',
        ]);

        $query = Contact::findOrFail($id);
        $query->response = $request->reply_message;
        $query->updated_at = now();
        $query->save();

        return redirect()->route('admin.queries')->with('success', 'Reply sent successfully.');
    }
}
