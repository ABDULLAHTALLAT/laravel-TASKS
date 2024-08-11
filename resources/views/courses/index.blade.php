
   
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .table-wrapper {
            margin: 30px auto;
            max-width: 90%;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        .table img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
        }
        .pagination-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination {
            display: flex;
            list-style: none;
            padding-left: 0;
            border-radius: 0.375rem;
            font-size: 0.875rem;
        }

        .pagination .page-item {
            margin: 0 2px;
        }

        .pagination .page-link {
            display: block;
            padding: 0.25rem 0.5rem;
            margin: 0;
            line-height: 1.25;
            color: #007bff;
            text-align: center;
            text-decoration: none;
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
        }

        .pagination .page-link:hover {
            color: #0056b3;
            background-color: #e9ecef;
            border-color: #dee2e6;
        }

        .pagination .page-item.active .page-link {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }

        .pagination .page-item.disabled .page-link {
            color: #6c757d;
            background-color: #fff;
            border-color: #dee2e6;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <h1>Courses</h1>
                <div>
                    <a href="{{ route('courses.create') }}" class="btn btn-primary">Add Course</a>
                    <a href="{{ route('tracks.index') }}" class="btn btn-secondary">Go to Tracks</a>
                    <a href="{{ route('students.index') }}" class="btn btn-success">Go to students</a>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Type</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Level</th>
                        <th scope="col">Track</th>
                        <th scope="col">Image</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach($courses as $course)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->description }}</td>
                        <td>{{ ucfirst($course->type) }}</td>
                        <td>{{ $course->total_duration }} minutes</td>
                        <td>{{ ucfirst($course->level) }}</td>
                        <td>{{ $course->track->name ?? 'No Track' }}</td>
                        <td>
                            @if($course->image)
                                <img src="{{ url('storage/images/' . $course->image) }}" alt="Course Image">
                            @else
                                <p>No Image Available</p>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('courses.show', $course->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="pagination-container">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item {{ $courses->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $courses->previousPageUrl() }}">Previous</a>
                    </li>
                    @for ($i = 1; $i <= $courses->lastPage(); $i++)
                        <li class="page-item {{ $i == $courses->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $courses->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item {{ $courses->hasMorePages() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $courses->nextPageUrl() }}">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
