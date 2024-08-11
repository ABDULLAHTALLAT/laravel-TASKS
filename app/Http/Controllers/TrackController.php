<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrackController extends Controller
{
    public function index()
    {
        $tracks = Track::all();
        return view('tracks.index', compact('tracks'));
    }

    public function create()
    {
        return view('tracks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName); // Save image in storage/app/public/images
            $data['image'] = $imageName; // Save only the image name in the database
        }

        Track::create($data);

        return redirect()->route('tracks.index')->with('success', 'Track created successfully!');
    }

    public function show(Track $track)
    {
        return view('tracks.show', compact('track'));
    }

    public function edit(Track $track)
    {
        return view('tracks.edit', compact('track'));
    }

    public function update(Request $request, Track $track)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($track->image && Storage::exists('public/images/' . $track->image)) {
                Storage::delete('public/images/' . $track->image);
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName); // Save the new image
            $data['image'] = $imageName; // Update the image name in the database
        }

        $track->update($data);

        return redirect()->route('tracks.index')->with('success', 'Track updated successfully!');
    }

    public function destroy(Track $track)
    {
        // Delete the image from storage if it exists
        if ($track->image && Storage::exists('public/images/' . $track->image)) {
            Storage::delete('public/images/' . $track->image);
        }

        $track->delete();

        return redirect()->route('tracks.index')->with('success', 'Track deleted successfully!');
    }
}
