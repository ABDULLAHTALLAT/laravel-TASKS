<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Track; // Assuming courses have tracks
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $courses = Course::paginate(4); // Adjust pagination as needed
        return view('courses.index', compact('courses'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        $tracks = Track::all(); // Fetch all tracks for the dropdown
        return view('courses.create', compact('tracks'));
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string',
            'total_duration' => 'required|integer',
            'level' => 'required|string',
            'track_id' => 'nullable|exists:tracks,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $course = new Course();
        $course->name = $validatedData['name'];
        $course->description = $validatedData['description'];
        $course->type = $validatedData['type'];
        $course->total_duration = $validatedData['total_duration'];
        $course->level = $validatedData['level'];
        $course->track_id = $validatedData['track_id'];

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $course->image = $imagePath;
        }

        $course->save();

        return redirect()->route('courses.index')->with('success', 'Course added successfully.');
    }

    // Display the specified resource
    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    // Show the form for editing the specified resource
    public function edit(Course $course)
    {
        $tracks = Track::all(); // Fetch all tracks for the dropdown
        return view('courses.edit', compact('course', 'tracks'));
    }

    // Update the specified resource in storage
    public function update(Request $request, Course $course)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string',
            'total_duration' => 'required|integer',
            'level' => 'required|string',
            'track_id' => 'nullable|exists:tracks,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $course->name = $validatedData['name'];
        $course->description = $validatedData['description'];
        $course->type = $validatedData['type'];
        $course->total_duration = $validatedData['total_duration'];
        $course->level = $validatedData['level'];
        $course->track_id = $validatedData['track_id'];

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($course->image) {
                Storage::delete('public/' . $course->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
            $course->image = $imagePath;
        }

        $course->save();

        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy(Course $course)
    {
        // Delete the image if it exists
        if ($course->image) {
            Storage::delete('public/' . $course->image);
        }

        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}
