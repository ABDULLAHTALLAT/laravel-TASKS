<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracks Index</title>
    <!-- Include Bootstrap CSS -->
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
        .table thead th {
            background-color: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
        }
        .table tbody tr {
            vertical-align: middle;
        }
        .table img {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            object-fit: cover;
        }
        .btn-delete {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }
        .actions a {
            margin-right: 10px;
        }
        .actions form {
            display: inline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1>Tracks</h1>
                <div>
                    <a href="{{ route('tracks.create') }}" class="btn btn-primary">Add Track</a>
                    <a href="{{ route('students.index') }}" class="btn btn-secondary">Go to Students</a>
                    <a href="{{ route('courses.index') }}" class="btn btn-success">COURSES</a>
                </div>
            </div>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tracks as $track)
                    <tr>
                        <td>{{ $track->name }}</td>
                        <td>{{ $track->location }}</td>
                        <td>
                            @if($track->image)
                            <img src="{{ url('storage/images/' . $track->image) }}" alt="Track Image">
                            @else
                            <p>No Image Available</p>
                            @endif
                        </td>
                        <td class="actions">
                            <a href="{{ route('tracks.show', $track->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('tracks.edit', $track->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('tracks.destroy', $track->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
