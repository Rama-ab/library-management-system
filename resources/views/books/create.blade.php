@include('layouts.navbar')
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add New Book</title>
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

        .btn-books {
            background-color: #28a745;
            color: white;
        }

        .btn-books:hover {
            background-color: #218838;
            color: white;
        }
    </style>
</head>
<body>
<div class="container mt-5 fade-in">
    <h1 class="mb-4">Add New Book</h1>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="author_id">Author</label>
            <select class="form-control" id="author_id " name="author_id" required>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="categories">Categories</label>
            @foreach($categories as $category)
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="category_{{ $category->id }}" name="categories[]" value="{{ $category->id }}">
                    <label class="form-check-label" for="category_{{ $category->id }}">{{ $category->name }}</label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary btn-animate">Create Book</button>
        <button type="button" class="btn btn-secondary btn-animate" onclick="history.back()">Back</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
