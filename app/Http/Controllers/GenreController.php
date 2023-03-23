<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Requests\Genres\GenresRequest;
use App\Http\Resources\Genres\GenreResource;
use App\Http\Resources\Genres\GenreCollection;

class GenreController extends Controller
{
    public function __construct(){
        $this->middleware(['auth:api','role:admin','verified']);
    }
    
    public function index()
    {
        $genres = Genre::all();
        return response()->json([
            "status" => true,
            "results" => new GenreCollection($genres)
        ],200);
    }

    
    public function store(GenresRequest $request)
    {
        $genre = Genre::create($request->all());
        return response()->json([
            "status" => true,
            "message" => "genre added succefully",
            "results" => new GenreResource($genre)
        ],201);
    }

    
    public function show(Genre $genre)
    {
        return response()->json([
            "status" => true,
            "results" => new GenreResource($genre)
        ],200);
    }

    
    public function update(GenresRequest $request,Genre $genre)
    {
        $genre->update($request->all());
        return response()->json([
            "status" => true,
            "message" => "Genre has been updated succefully",
            "results" => new GenreResource($genre)
        ],200);
    }

    
    public function destroy(Genre $genre)
    {
        $genre->delete();
        return response()->json([
            'status' => true,
            'message' => 'Genre deleted successfully'
        ], 200);
    }
}
