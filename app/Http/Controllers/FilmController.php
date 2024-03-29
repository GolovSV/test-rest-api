<?php

namespace App\Http\Controllers;

use App\Filters\FilmFilters;
use App\Http\Requests\StoreFilmRequest;
use App\Http\Resources\FilmResource;
use App\Models\Film;

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
        return response()->json(FilmResource::collection(Film::Filter($filter)->get()));
    }


    /**
     * Store a newly created resource in storage.
     * @param StoreFilmRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreFilmRequest $request)
    {
        $film = Film::firstOrCreate($request->all());
        return response()->json(new FilmResource(Film::find($film->id)), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Film $film
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Film $film)
    {
        return response()->json(new FilmResource(Film::find($film->id)));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Film $film
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(StoreFilmRequest $request, Film $film)
    {
        $film->update($request->all());
        return response()->json(new FilmResource(Film::find($film->id)));
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
