<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Course</h1>

        <form action="{{ route('courses.update', $course) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Course Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $course->name) }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="3" required>{{ old('description', $course->description) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select name="type" id="type" class="form-select" required>
                    <option value="online" {{ old('type', $course->type) == 'online' ? 'selected' : '' }}>Online</option>
                    <option value="offline" {{ old('type', $course->type) == 'offline' ? 'selected' : '' }}>Offline</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="total_duration" class="form-label">Total Duration (minutes)</label>
                <input type="number" name="total_duration" id="total_duration" class="form-control" value="{{ old('total_duration', $course->total_duration) }}" required>
            </div>
            <div class="mb-3">
                <label for="level" class="form-label">Level</label>
                <select name="level" id="level" class="form-select" required>
                    <option value="beginner" {{ old('level', $course->level) == 'beginner' ? 'selected' : '' }}>Beginner</option>
                    <option value="intermediate" {{ old('level', $course->level) == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                    <option value="advanced" {{ old('level', $course->level) == 'advanced' ? 'selected' : '' }}>Advanced</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="track_id" class="form-label">Track</label>
                <select name="track_id" id="track_id" class="form-select" required>
                    @foreach($tracks as $track)
                        <option value="{{ $track->id }}" {{ $track->id == $course->track_id ? 'selected' : '' }}>{{ $track->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" name="photo" id="photo" class="form-control">
                @if($course->photo)
                    <img src="{{ asset('storage/images/' . $course->photo) }}" class="mt-2" alt="Course Photo" style="height: 100px;">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
