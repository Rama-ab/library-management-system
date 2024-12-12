@include('layouts/navbar')

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Authors</title>
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
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="container mt-5 fade-in">
    <h1 class="mb-4">Authors</h1>
    <a href="{{ route('authors.create') }}" class="btn btn-primary mb-3 btn-animate">Add New Author</a>

    <table class="table table-striped table-bordered mt-3">
        <thead class="thead-dark">
        <tr>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($authors as $author)
            <tr>
                <td>{{ $author->name }}</td>
                <td>
                    <a href="{{ route('authors.show', $author) }}" class="btn btn-info btn-sm btn-animate">View</a>
                    <a href="{{ route('authors.edit', $author) }}" class="btn btn-warning btn-sm btn-animate">Edit</a>
                    <form action="{{ route('authors.destroy', $author) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm btn-animate" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


