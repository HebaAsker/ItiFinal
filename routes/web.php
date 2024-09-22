<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;




//------------------------------Admin Dashboard--------------------------------------//

Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard'); // Display dashboard route


Route::get('dashboard/admin/form', [AdminController::class, 'editAdminForm'])->name('admin.info'); // Display update profile form page


Route::post('dashboard/update/admin', [AdminController::class, 'updateAdminInfo'])->name('update.admin.info'); // Update admin data route


Route::get('students',[AdminController::class,'getAllStudents'])->name('students'); // Diplay all students for admin


Route::get('search/students',[AdminController::class,'searchStudentById'])->name('students.search'); // Search student by id


Route::get('books',[BookController::class,'index'])->name('books'); // Diplay all books for admin


Route::get('borrowed_books',[AdminController::class,'getBorrowedBooks'])->name('borrowed.books'); // Diplay all borrowed books for admin


Route::get('show/book/{id}',[BookController::class,'show'])->name('book.info'); // Diplay specific book information for admin


Route::get('create/book',[BookController::class,'create'])->name('book.create'); // Display create book form page


Route::post('store/book',[BookController::class,'store'])->name('book.store'); // Add new book in DB


Route::get('edit/book/{id}',[BookController::class,'edit'])->name('book.edit'); // Display edit book form page


Route::post('update/book/{id}',[BookController::class,'update'])->name('book.update'); // Update book info in DB


Route::post('destroy/book/{id}',[BookController::class,'destroy'])->name('book.destroy'); // Delete book from DB


































Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
