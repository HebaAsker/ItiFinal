<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UpdateProfileController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {

    Route::get('edit/profile/form', [UpdateProfileController::class, 'edit'])->name('edit.info'); // Display update profile form page
    Route::post('update/profile', [UpdateProfileController::class, 'update'])->name('update.info'); // Update data route


    //---------------------------------------------Admin Dashboard--------------------------------------------------//

    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard'); // Display dashboard route
    Route::get('students', [AdminController::class, 'getAllStudents'])->name('students'); // Display all students for admin
    Route::get('search/students', [AdminController::class, 'searchStudentById'])->name('students.search'); // Search student by id
    Route::get('search/books', [AdminController::class, 'searchBook'])->name('books.search'); // Search book by name or author
    Route::get('books', [BookController::class, 'index'])->name('books'); // Display all books for admin
    Route::get('borrowed_books', [AdminController::class, 'getBorrowedBooks'])->name('borrowed.books'); // Display all borrowed books for admin
    Route::get('show/book/{id}', [BookController::class, 'show'])->name('book.info'); // Display specific book information for admin
    Route::get('create/book', [BookController::class, 'create'])->name('book.create'); // Display create book form page
    Route::post('store/book', [BookController::class, 'store'])->name('book.store'); // Add new book in DB
    Route::get('edit/book/{id}', [BookController::class, 'edit'])->name('book.edit'); // Display edit book form page
    Route::post('update/book/{id}', [BookController::class, 'update'])->name('book.update'); // Update book info in DB
    Route::post('destroy/book/{id}', [BookController::class, 'destroy'])->name('book.destroy'); // Delete book from DB
    Route::get('book/status', [AdminController::class, 'unborrow'])->name('book.status');

    //-----------------------------------------------------------------------------------------------------------------------//

    //----------------------------------------------Student Dashboard-----------------------------------------------------------//

    Route::get('student/books', [StudentController::class, 'index'])->name('student.books'); // Display student dashboard route
    Route::get('show/book/{id}', [StudentController::class, 'show'])->name('student.book.info'); // Display specific book information for student
    Route::get('borrowed/books', [StudentController::class, 'showBorrowedBooks'])->name('student.borrowed.books'); // Display student borrowed books
    Route::get('borrow/book', [StudentController::class, 'borrow'])->name('book.borrow'); // Student can borrow a book

});

// Auth Routes
require __DIR__.'/auth.php';
Auth::routes();

