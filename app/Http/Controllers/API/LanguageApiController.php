<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\ApiBaseController;
use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Js;
use Psy\Util\Json;
use function PHPUnit\Framework\isNull;

class LanguageApiController extends ApiBaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $languages = Language::all();

        if (!is_null($languages) && $languages->count() > 0) {
            return $this->sendResponse(
                $languages,
                "Retrieved successfully.",
            );
        }

        return $this->sendError("No Languages Found");
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

        $results = Language::create($validated);

        if (!is_null($results) && $results->count() > 0) {
            return $this->sendResponse(
                $results,
                "Created language successfully.",
            );
        }

        return $this->sendError("Unable to create language");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $language = Language::find($id);

        if (isset($language) && $language->count() > 0) {
            return $this->sendResponse(
                $language,
                "Retrieved successfully.",
            );
        }

        return $this->sendError("Language Not Found");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $language = Language::find($id);

        if (!is_null($language)) {
            $validated = [
                'name' => $request['name'] ?? $language['name'],
                'code' => isset($request['code']) ? $request['code'] : $language['code'],
                'description' => $request['description'] ?? $language['description'],
            ];

            $results = $language->update($validated);

            if (isset($results) && $results->count() > 0) {
                return $this->sendResponse(
                    $results,
                    "Retrieved successfully.",
                );
            }
            return $this->sendError("Unable to update language");
        }

        return $this->sendError("Unable to update unknown language");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $language = Language::find($id);
        $results = $language;

        if (!is_null($language) && $language->count() > 0) {

            $deleted = $language->delete();

            if ($deleted) {
                return $this->sendResponse($results, "Deleted successfully.");
            }
            return $this->sendError("Unable to delete language");
        }

        return $this->sendError("Unable to delete unknown language");
    }
}
