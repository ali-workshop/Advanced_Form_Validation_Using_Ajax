<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AjaxFormController extends Controller
{
    public function index()
    {
        return view('ajax-form');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'message' => 'required'
            ]);
                User::create($request->all());
            // Process the validated data
            return response()->json(['message' => 'Added new record.']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // If validation fails, return the validation error message
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }
}
