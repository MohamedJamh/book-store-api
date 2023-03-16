<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Http\Requests\Genres\GenresRequest;
use App\Http\Resources\Genres\GenreResource;
use App\Http\Resources\Genres\GenreCollection;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function __construct(){
        $this->middleware('verified');
    }
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $genres = Genre::all();
        return response()->json([
            "status" => true,
            "result" => new GenreCollection($genres)
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(GenresRequest $request)
    {
        $genre = Genre::create($request->all());
        return response()->json([
            "status" => true,
            "message" => "genre added succefully",
            "result" => new GenreResource($genre)
        ],201);
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Genre $genre)
    {
        return response()->json([
            "status" => true,
            "result" => new GenreResource($genre)
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(GenresRequest $request,Genre $genre)
    {
        $genre->update($request->all());
        return response()->json([
            "status" => true,
            "message" => "Genre has been updated succefully",
            "result" => new GenreResource($genre)
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();
        return response()->json([
            'status' => true,
            'message' => 'Genre deleted successfully'
        ], 200);
    }
}
