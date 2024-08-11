<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: black;
          
        }
        .card {
            background-color: antiquewhite;
            border-radius: 1rem;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.8);
        }
        .card-body {
            text-align: center;
        }
        .card img {
            border-radius: 50%;
            margin-bottom: 15px;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $student->name }}</h5>
                @if($student->image)
                    <img src="{{ url('storage/images/' . $student->image) }}" alt="student photo" class="img-fluid">
                @else
                    <img src="https://via.placeholder.com/100" alt="placeholder photo" class="img-fluid">
                @endif
                <p class="card-text"><strong>Email:</strong> {{ $student->email }}</p>
                <p class="card-text"><strong>Age:</strong> {{ $student->age }}</p>
                <p class="card-text"><strong>Gender:</strong> {{ ucfirst($student->gender) }}</p>
                <p class="card-text"><strong>Track:</strong> {{ $student->track->name ?? 'No Track' }}</p>
                <a href="{{ route('students.index') }}" class="btn btn-primary">Back to List</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
