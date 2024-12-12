@include('layouts.navbar')
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Books</title>
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
    <h1 class="mb-4">Books</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3 btn-animate">Create</a>
    <a href="{{ route('books.deleted') }}" class="btn btn-danger mb-3 btn-animate">View Deleted Books</a>

    <form action="{{ route('books.index') }}" method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Search by title" value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <select name="category" class="form-control">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select name="author" class="form-control">
                    <option value="">All Authors</option>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}" {{ request('author') == $author->id ? 'selected' : '' }}>
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary btn-block">Filter</button>
            </div>
        </div>
    </form>

    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Categories</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author->name }}</td>
                <td>
                    @foreach($book->categories as $category)
                        {{ $category->name }}@if(!$loop->last), @endif
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('books.show', $book) }}" class="btn btn-sm btn-info btn-animate">View</a>
                    <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-warning btn-animate">Edit</a>
                    <form action="{{ route('books.destroy', $book) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger btn-animate" >Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $books->links() }}
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
