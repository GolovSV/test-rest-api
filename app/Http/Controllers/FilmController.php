<?php

namespace App\Http\Controllers;

use App\Filters\FilmFilters;
use App\Models\Film;
use Illuminate\Http\Request;

/**
 *
 */
class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(FilmFilters $filter)
    {

        return response()->json(Film::Filter($filter)->get());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $film = Film::create($request->all());

        return response()->json($film, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Film $film
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Film $film)
    {
        return response()->json($film);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Film $film
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Film $film)
    {
        $film->update($request->all());
        return response()->json($film, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Film $film
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Film $film)
    {
        $film->delete();
        return response()->json(null, 204);
    }
}