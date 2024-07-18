<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquiry;

class EnquiryController extends Controller
{
    public function store(Request $request)
    {
        // Server-side validation
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'contactNumber' => 'required|numeric',
            'message' => 'required|string|max:1000',
        ]);

        // Create a new enquiry
        $enquiry = new Enquiry();
        $enquiry->name = $request->name;
        $enquiry->email = $request->email;
        $enquiry->contact_number = $request->contactNumber;
        $enquiry->message = $request->message;
        $enquiry->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Your message has been sent successfully.');
    }

    public function delete(Request $request, $id)
    {
        // Find the enquiry by ID
        $enquiry = Enquiry::find($id);

        // Check if the enquiry exists
        if ($enquiry) {
            // Delete the enquiry
            $enquiry->delete();
            // Return success response
            return response()->json(['message' => 'Enquiry deleted successfully'], 200);
        } else {
            // Return error response if the enquiry does not exist
            return response()->json(['error' => 'Enquiry not found'], 404);
        }
    }

    public function view($id)
    {
        $enquiries = Enquiry::find($id);
        if($enquiries) {
            $enquiries->status = 'Seen';
            $enquiries->save();
        }
        return view('admin/viewEnquiry', ['enquiries' => $enquiries]);
    }
}
