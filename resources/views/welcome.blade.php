<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Library Management</title>
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

        .stats-card {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .stats-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: #007bff;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Library Management</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('books.index') }}">Book</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('authors.index') }}">Authors</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-5 fade-in">
    <h1 class="mb-4">Library Management</h1>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="stats-card">
                <h3>Books</h3>
                <p class="stats-number">{{ $booksCount }}</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stats-card">
                <h3>Authors</h3>
                <p class ="stats-number">{{ $authorsCount }}</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stats-card">
                <h3>Categories</h3>
                <p class="stats-number">{{ $categoriesCount }}</p>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-around">
        <a href="{{ route('books.index') }}" class="btn btn-books btn-animate">Manage Books</a>
        <a href="{{ route('authors.index') }}" class="btn btn-secondary btn-animate">Manage Authors</a>
        <a href="{{ route('categories.index') }}" class="btn btn-primary btn-animate">Manage Categories</a>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
