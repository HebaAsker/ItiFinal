<?php

namespace App\Http\Controllers;

use App\Models\Book;

use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    //show all books
    public function index()
    {
        $books = Book::latest()->paginate(10);
        return view('pages.dashboard.student.index', compact('books'));
    }


    //show a specified book
    public function show($id)
    {
        $books = Book::findOrFail($id);
        return view('pages.dashboard.student.view', compact('books'));
    }


    //show books student borrowed
    public function showBorrowedBooks()
    {
        $borrowed_books = Book::where('status', 'borrowed')->where('user_id',Auth::user()->id)->paginate(20);

        return view('pages.dashboard.student.borrowed', compact('borrowed_books'));
    }


    public function borrow()
    {
        $book_id = request()->query('id');
        $book = Book::findOrFail($book_id);


        // Toggle the book status
        if ($book->status == 'borrowed') {
            return redirect()->back()->with('error', 'This book is not available for borrowing.');
        } else {
            $book->status = 'borrowed';
            $book->user_id = Auth::user()->id;
            $book->updated_at = now();
        }

        $book->save();

        return redirect()->back()->with('status', 'You have successfully borrowed the book. Please return it within 14 days at the latest.');
    }

}
