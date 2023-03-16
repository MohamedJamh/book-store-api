<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\StoreBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct(){
        // $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $books = Book::all();
        return response()->json([
            "message" => true,
            "books" => $books
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(StoreBookRequest $request)
    {
        $book = Book::create($request->all());
        return response()->json([
            "status" => true,
            "message" => "Book has been added !",
            "result" => $book
        ]);
    }

    /**
     * Display the specified resource.
     *
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
