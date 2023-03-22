<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\StoreBookRequest;
use App\Http\Requests\Book\UpdateBookRequest;
use App\Http\Resources\Book\BookCollection;
use App\Http\Resources\Book\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api');
        
    }
    
    public function index()
    {
        $books = Book::all();
        return response()->json([
            "message" => true,
            "results" => new BookCollection($books)
        ]);
    }

    
    public function store(StoreBookRequest $request)
    {
        $books = Book::create($request->all());
        return response()->json([
            "status" => true,
            "message" => "Book has been added !",
            "results" => new BookResource($books)
        ]);
    }

    
    public function show(Book $book)
    {
        return response()->json([
            "status" => true,
            "results" => new BookResource($book)
        ]);
    }

    
    public function update(UpdateBookRequest $request, Book $book)
    {
        $book->update($request->all());
        return response()->json([
            "status" => true,
            "message" => "Book has been updated!",
            "results" => new BookResource($book)
        ]);
    }


    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json([
            "status" => true,
            "message" => "Book has been deleted !"
        ]);
    }
    public function trashIndex(){
        $books = Book::onlyTrashed()->get();
        return response()->json([
            "status" => true,
            "results" => new BookCollection($books)
        ]);
    }
    public function trashShow($id){
        $book = Book::withTrashed()->find($id);
        if(!$book)  return abort(404);
        return response()->json([
            "status" => true,
            "result" => new BookResource($book)
        ]);
    }

}
