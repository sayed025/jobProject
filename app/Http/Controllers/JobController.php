<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    // Get all jobs
    public function index()
    {
        return Job::all();
    }

    // Create a new job
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'location' => 'required|string',
            'salary' => 'nullable|numeric',
            'user_id' => 'required|exists:users,id',
        ]);

        return Job::create($request->all());
    }



    // Get a single job
    public function show($id)
    {
        return Job::findOrFail($id);
    }

    // Update a job
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'location' => 'required|string',
            'salary' => 'nullable|numeric',
        ]);

        $job = Job::findOrFail($id);
        $job->update($request->all());

        return $job;
    }

    // Delete a job
    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();

        return response()->json(['message' => 'Job deleted successfully']);
    }
}
