<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::all();

        return response()->json([
            'status' => 200,
            'message' => 'list of books',
            'data' => $books
        ], 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'catid' => 'required',
            'isbn' => 'required',
            'price' => 'required',
            'isborrowed' => 'required',
            'status' => 'required',

        ]);

        $book = Book::create($data);

        return response()->json([
            'status' => 200,
            'message' => 'Book Created Successfully',
            'data' => $book,
        ], 200);
    }

    public function show($id)
    {
        $book = Book::findOrfail($id);   

        return response()->json([
            'status' => 200,
            'message' => '1 book retrieved',
            'data' => $book
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'author' => 'nullable|string|max:255',
            'catid' => 'nullable',
            'isbn' => 'nullable',
            'price' => 'nullable',
            'isborrowed' => 'nullable',
            'status' => 'nullable',

        ]);

        $book = Book::find($id);   

        if($book){
            
            $book->update($data);

            return response()->json([
                'status' => 200,
                'message' => 'Book Updated Successfully',
                'data' => $book,
            ], 200);

        }else{

            return response()->json([
                'status' => 404,
                'message' => 'Book Not Found',
                'data' => null,
            ], 404);

        }

        return response()->json([
            'status' => 200,
            'message' => '1 book retrieved',
            'data' => $book
        ], 200);
    }

    public function destroy($id)
    {

        $book = Book::find($id);   

        if($book){
            
            $book->delete();

            return response()->json([
                'status' => 200,
                'message' => 'Book Deleted Successfully',
                'data' => null,
            ], 200);

        }else{

            return response()->json([
                'status' => 404,
                'message' => 'Book Not Found',
                'data' => null,
            ], 404);

        }

        return response()->json([
            'status' => 200,
            'message' => '1 book retrieved',
            'data' => $book
        ], 200);        
    }
}
