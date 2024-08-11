<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('track')->get();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $tracks = Track::all(); 
        return view('students.create', compact('tracks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'age' => 'required|integer',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gender' => 'required|in:male,female',
            'track_id' => 'required|exists:tracks,id',
            'grade' => 'nullable|string|max:255', // Make sure grade validation is included
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('images');
        }

        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'photo' => $photoPath,
            'gender' => $request->gender,
            'track_id' => $request->track_id,
            'grade' => $request->grade, // Include grade in the creation
        ]);

        return redirect()->route('students.index');
    }

    public function edit(Student $student)
    {
        $tracks = Track::all(); // Fetch all tracks for the dropdown
        return view('students.edit', compact('student', 'tracks'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'age' => 'required|integer',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gender' => 'required|in:male,female',
            'track_id' => 'required|exists:tracks,id',
            'grade' => 'nullable|string|max:255', // Make sure grade validation is included
        ]);

        $photoPath = $student->photo;
        if ($request->hasFile('photo')) {
            if ($photoPath) {
                Storage::delete($photoPath);
            }
            $photoPath = $request->file('photo')->store('images');
        }

        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'photo' => $photoPath,
            'gender' => $request->gender,
            'track_id' => $request->track_id,
            'grade' => $request->grade, // Include grade in the update
        ]);

        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        if ($student->photo) {
            Storage::delete($student->photo);
        }
        $student->delete();

        return redirect()->route('students.index');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }
}
