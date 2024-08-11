<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Centering the pagination */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination .page-item {
            margin: 0 2px;
        }

        .pagination .page-link {
            border-radius: 0;
        }

        /* Card styling */
        .card {
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            max-width: 600px; /* Set a max-width for the card */
            margin: 0 auto; /* Center the card horizontally */
        }

        .card-img-top {
            height: 150px; /* Fixed height for the image */
            width: 150px; /* Fixed width for the image to maintain circular shape */
            border-radius: 50%; /* Make the image circular */
            object-fit: cover; /* Ensure the image covers the area */
            margin: 20px auto; /* Center the image horizontally */
        }

        .card-body {
            padding: 1.5rem;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Course Details</h1>

        <div class="card">
            <div class="text-center mt-3">
                @if($course->image)
                    <img src="{{ asset('storage/images/' . $course->image) }}" class="card-img-top" alt="Course Photo">
                @else
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="No Image Available">
                @endif
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $course->name }}</h5>
                <p class="card-text">{{ $course->description }}</p>
                <p class="card-text">Type: {{ ucfirst($course->type) }}</p>
                <p class="card-text">Total Duration: {{ $course->total_duration }} minutes</p>
                <p class="card-text">Level: {{ ucfirst($course->level) }}</p>
                <p class="card-text">Track: {{ $course->track->name ?? 'No Track' }}</p>
                <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
