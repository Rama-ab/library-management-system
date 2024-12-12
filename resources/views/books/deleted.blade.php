<!-- resources/views/books/deleted.blade.php -->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Deleted Books</title>
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
@include('layouts.navbar')
<div class="container mt-5 fade-in">
    <h1 class="mb-4">Deleted Books</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped table-bordered mt-3">
        <thead class="thead-dark">
        <tr>
            <th>Title</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($deletedBooks as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>
                    <form action="{{ route('books.restore', $book->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm btn-animate">Restore</button>
                    </form>
                    <form action="{{ route('books.force.delete', $book->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm btn-animate" onclick="return confirm('Are you sure?')">Delete for ever</button>
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
