<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 1rem;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        .card-body {
            text-align: center;
        }
        .card img {
            border-radius: 10px;
            margin-bottom: 15px;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .card-title {
            font-size: 1.5rem;
        }
        .card-text {
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $track->name }}</h5>
                <p class="card-text"><strong>Location:</strong> {{ $track->location }}</p>
                @if($track->image)
                    <img src="{{ url('storage/images/' . $track->image) }}" alt="Track Image" class="img-fluid">
                @else
                    <p>No Image Available</p>
                @endif
                <a href="{{ route('tracks.index') }}" class="btn btn-primary">Back to List</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
