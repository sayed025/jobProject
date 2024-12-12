<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    // Get all applications
    public function index()
    {
        return Application::all();
    }

    // Create a new application
    public function store(Request $request)
    {
        $request->validate([
            'job_id' => 'required|exists:jobs,id',
            'user_id' => 'required|exists:users,id',
            'cover_letter' => 'nullable|string',
        ]);

        return Application::create($request->all());
    }

    // Get a single application
    public function show($id)
    {
        return Application::findOrFail($id);
    }

    // Update an application
    public function update(Request $request, $id)
    {
        $request->validate([
            'cover_letter' => 'nullable|string',
        ]);

        $application = Application::findOrFail($id);
        $application->update($request->all());

        return $application;
    }

    // Delete an application
    public function destroy($id)
    {
        $application = Application::findOrFail($id);
        $application->delete();

        return response()->json(['message' => 'Application deleted successfully']);
    }
}
