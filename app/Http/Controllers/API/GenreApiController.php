<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\ApiBaseController;
use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Js;
use Psy\Util\Json;
use function PHPUnit\Framework\isNull;

class GenreApiController extends ApiBaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $genres = Genre::all();

        if (!is_null($genres) && $genres->count() > 0) {
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
    public function store(Request $request): JsonResponse
    {
        $validated = [
            'name' => $request['name'],
            'description' => $request['description'],
        ];

        $results = Genre::create($validated);

        if (!is_null($results) && $results->count() > 0) {
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

        if (isset($genre) && $genre->count() > 0) {
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
    public function update(Request $request, string $uuid): JsonResponse
    {
        //$genre = Genre::find($id);
        $genre = Genre::whereUuid($uuid)->first();

        if (isset($genre) && !is_null($genre)) {
            $validated = [
                'name' => $request['name'] ?? $genre['name'],
                'code' => isset($request['code']) ? $request['code'] : $genre['code'],
                'description' => $request['description'] ?? $genre['description'],
            ];

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

        if (!is_null($genre) && $genre->count() > 0) {

            $deleted = $genre->delete();

            if ($deleted) {
                return $this->sendResponse($results, "Deleted genre successfully.");
            }
            return $this->sendError("Unable to delete genre");
        }

        return $this->sendError("Unable to delete unknown genre");
    }
}
