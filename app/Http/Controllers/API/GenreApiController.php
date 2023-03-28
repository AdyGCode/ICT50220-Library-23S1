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
            'code' => $request['code'],
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
    public function show(string $id): JsonResponse
    {

        $genre = Genre::where('uuid','=',$id)->first();

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
    public function update(Request $request, string $id): JsonResponse
    {
        $genre = Genre::find($id);

        if (!is_null($genre)) {
            $validated = [
                'name' => $request['name'] ?? $genre['name'],
                'code' => isset($request['code']) ? $request['code'] : $genre['code'],
                'description' => $request['description'] ?? $genre['description'],
            ];

            $results = $genre->update($validated);

            if (isset($results) && $results->count() > 0) {
                return $this->sendResponse(
                    $results,
                    "Retrieved successfully.",
                );
            }
            return $this->sendError("Unable to update genre");
        }

        return $this->sendError("Unable to update unknown genre");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $genre = Genre::find($id);
        $results = $genre;

        if (!is_null($genre) && $genre->count() > 0) {

            $deleted = $genre->delete();

            if ($deleted) {
                return $this->sendResponse($results, "Deleted successfully.");
            }
            return $this->sendError("Unable to delete genre");
        }

        return $this->sendError("Unable to delete unknown genre");
    }
}