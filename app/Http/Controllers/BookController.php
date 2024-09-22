<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\BooksRequest;

class BookController extends Controller
{

    // Display all books
    public function index()
    {

        $books = Book::latest()->paginate(10);
        return view('pages.dashboard.books.index',compact('books'));
    }


    public function create()
    {
        return view('pages.dashboard.books.add');

    }


    public function store(BooksRequest $request)
    {

        $data = $request->validated();

       $file_extension=$request->img->getClientOriginalExtension();

       $file_name=time().'.'.$file_extension;

      $path=public_path('images/books');

      $request->img->move($path,$file_name);

        $book = Book::create([
            'name' => $data['name'],
            'author' => $data['author'],
            'img' => $file_name,
        ]);

        return redirect('/books');
    }



    public function show($id)
    {
        $books = Book::find($id);
        return view('pages.dashboard.books.view', compact('books'));
    }


    public function edit($id)
    {

        $book = Book::find($id);
        return view('pages.dashboard.books.edit', compact('book'));
    }


    public function update(BooksRequest $request, $id)
{
    $book = Book::findOrFail($id);

    $data = $request->validated();

    if ($request->hasFile('img')) {
        $file_extension = $request->img->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = public_path('images/books');
        $request->img->move($path, $file_name);
        $data['img'] = $file_name;
    } else {
        $data['img'] = $book->img;
    }

    $book->update($data);

    return redirect('/books')->with('success', 'Book updated successfully.');
}


    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();

        return redirect('/books');
    }


}
