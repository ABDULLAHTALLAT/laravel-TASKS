<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Create Student</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender:</label>
                                <select name="gender" id="gender" class="form-select" required>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="picture" class="form-label">Picture:</label>
                                <input type="file" name="photo" id="photo" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="track_id" class="form-label">Track:</label>
                                <select name="track_id" id="track_id" class="form-select" required>
                                    @foreach($tracks as $track)
                                        <option value="{{ $track->id }}">{{ $track->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="age" class="form-label">Age:</label>
                                <input type="number" name="age" id="age" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="grade" class="form-label">Grade:</label>
                                <input type="text" name="grade" id="grade" class="form-control" value="{{ old('grade') }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
