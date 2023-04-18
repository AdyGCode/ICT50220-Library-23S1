<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\ApiBaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaginationAPIRequest;
use App\Http\Requests\StoreGenreAPIRequest;
use App\Http\Requests\UpdateGenreAPIRequest;
use App\Models\Genre;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Js;
use Knuckles\Scribe\Attributes\Response;
use Knuckles\Scribe\Attributes\ResponseField;
use Knuckles\Scribe\Attributes\UrlParam;
use Psy\Util\Json;

class GenreApiController extends ApiBaseController
{

    /**
     * api/genres
     *
     * 200 List of all genres.
     */
    #[UrlParam("id", "int", "The author's ID.", required: true, example: 7)]
    #[Response('"authors": [{"id": 7,"given_name": "Kevin","family_name": "Potts","is_company": 0,"created_at": "2022-09-10T14:45:22.000000Z","updated_at": "2022-09-10T14:45:22.000000Z"}]', 200, "Retrieved successfully.")]
    #[ResponseField("status", "Success or failure indicator.")]
    #[ResponseField("message", "Accompanying message for the status result.")]
    #[ResponseField("authors", "The author details.")]
    public function index(PaginationAPIRequest $request): JsonResponse
    {
//        if (isset($request['all']) && $request['all']) {
//            $genres = Genre::all();
//        } else {
//            $genres = Genre::paginate($request['per_page']);
//        }
        $allGenres = $request['all'] === true || $request['all'] === 1;
        $genres = $allGenres ? Genre::all() :Genre::paginate($request['per_page']);

        if (!is_null($genres) && $genres && $genres->count() > 0) {
            return $this->sendResponse(
                $genres,
                "Retrieved successfully.",
            );
        }

        return $this->sendError("No Genres Found");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGenreAPIRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $results = Genre::create($validated);

        if (!is_null($results) && $genre && $results->count() > 0) {
            return $this->sendResponse(
                $results,
                "Created genre successfully.",
            );
        }

        return $this->sendError("Unable to create genre");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $uuid): JsonResponse
    {

        $genre = Genre::whereUuid($uuid)->first();

        if (!is_null($genre) && $genre && $genre->count() > 0) {
            return $this->sendResponse(
                $genre,
                "Retrieved successfully.",
            );
        }

        return $this->sendError("Genre Not Found");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGenreAPIRequest $request, string $uuid): JsonResponse
    {
        $genre = Genre::whereUuid($uuid)->first();

        if (!is_null($genre) && $genre && $genre !== false) {

            $validated = $request->validated();

            $isUpdated = $genre->update($validated);

            if ($isUpdated && $genre->count() > 0) {
                return $this->sendResponse(
                    $genre,
                    "Updated genre successfully.",
                );
            }
            return $this->sendError("Unable to update genre");
        }

        return $this->sendError("Unable to update unknown genre");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid): JsonResponse
    {
        $genre = Genre::whereUuid($uuid)->first();
        $results = $genre;

        if (!is_null($genre) && $genre && $genre->count() > 0) {

            $deleted = $genre->delete();

            if ($deleted) {
                return $this->sendResponse($results, "Deleted genre successfully.");
            }
            return $this->sendError("Unable to delete genre");
        }

        return $this->sendError("Unable to delete unknown genre");
    }
}
