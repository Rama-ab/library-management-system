<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('categories.id', $request->category);
            });
        }

        if ($request->filled('author')) {
            $query->where('author_id', $request->author);
        }

        $books = $query->with(['author', 'categories'])->paginate(10)->appends($request->all());
        $categories = Category::all();
        $authors = Author::all();

        return view('books.index', compact('books', 'categories', 'authors'));
    }


    public function deleted()
    {
        $deletedBooks = Book::onlyTrashed()->get();
        return view('books.deleted', compact('deletedBooks'));
    }

    public function restore($id)
    {
        $book = Book::onlyTrashed()->findOrFail($id);
        $book->restore();
        return redirect()->route('books.deleted')->with('success', 'Book restored successfully.');
    }


    public function create()
    {
        $authors = Author::all();
          $categories = Category::all();
        return view('books.create', compact('authors', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author_id' => 'required|exists:authors,id',
        ]);

        $book = Book::create($request->only(['title', 'description', 'author_id']));
        $book->categories()->attach($request->categories);
        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('books.edit', compact('book', 'authors', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $book->update($request->only(['title', 'description', 'author_id']));
        $book->categories()->sync($request->categories);

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully you can restore it from (Deleted books)') ;
    }

    public function forceDelete($id)
    {
        $book = Book::onlyTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('books.deleted')->with('success', 'Book deleted successfully.');
    }
}
