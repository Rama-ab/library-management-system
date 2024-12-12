@include('layouts/navbar')
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Author Details: {{ $author->name }}</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .fade-in {
            animation: fadeIn 2s;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .btn-animate {
            transition: transform 0.2s;
        }

        .btn-animate:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body>
<div class="container mt-5 fade-in">
    <h1 class="mb-4">Author Details: {{ $author->name }}</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Name: {{ $author->name }}</h5>
            <a href="{{ route('authors.edit', $author) }}" class="btn btn-warning btn-animate">Edit</a>
            <form action="{{ route('authors.destroy', $author) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-animate" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
        <button class="btn btn-secondary btn-animate" onclick="history.back()">Back</button>
    </div>
</div>




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
