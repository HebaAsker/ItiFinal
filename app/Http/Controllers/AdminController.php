<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.index');
    }

    public function getAllStudents()
    {
        $students= User::where('role', '=', 'student')->get();


        return view('pages.dashboard.student',compact('students'));
    }


    public function searchStudentById(Request $request)
    {
        $search = $request->input('search');

        $students = User::query()
            ->where('role', 'student')
            ->where('id', 'LIKE', "%{$search}%")
            ->get();

        return view('pages.dashboard.student', compact('students'));
    }



    public function getBorrowedBooks()
    {
        $books= Book::where('status', '=', 'borrowed')->paginate(20);


        return view('pages.dashboard.books.borrowed',compact('books'));
    }


}
