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



    public function editAdminForm()
{
    return view('pages.dashboard.edit_admin_info');
}

public function updateAdminInfo(Request $request)
{
    $user_id = Auth::id();
    $user = User::findOrFail($user_id);

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,',
        'password' => 'nullable|string|min:6|confirmed'
    ]);

    // Update user details
    $user->name = $request->input('name');
    $user->email = $request->input('email');

    if ($request->filled('password')) {
        $user->password = Hash::make($request->input('password'));
    }

    $user->save();

    return redirect()->route('admin.info')->with('success', 'Information updated successfully.');
}



}
