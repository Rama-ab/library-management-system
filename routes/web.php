<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    $booksCount = Book::count();
    $authorsCount = Author::count();
    $categoriesCount = Category::count();

    return view('welcome', compact('booksCount', 'authorsCount', 'categoriesCount'));
});

Route::get('books/deleted', [BookController::class, 'deleted'])->name('books.deleted');
Route::post('books/restore/{id}', [BookController::class, 'restore'])->name('books.restore');
Route::DELETE('books/force/delete/{id}', [BookController::class, 'forceDelete'])->name('books.force.delete');

Route::resource('books', BookController::class);
Route::resource('authors', AuthorController::class);
Route::resource('categories', CategoryController::class);



