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

    }
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $genres = Genre::all();
        return response()->json([
            "status" => "success",
            "result" => new GenreCollection($genres)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(GenresRequest $request)
    {
        $genre = Genre::create($request->all());
        return response()->json([
            "status" => "success",
            "message" => "genre added succefully",
            "result" => new GenreResource($genre)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
