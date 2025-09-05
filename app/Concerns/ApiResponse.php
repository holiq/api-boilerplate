<?php

namespace App\Concerns;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;

trait ApiResponse
{
    /**
     * @param  array<string, mixed> | Collection<string, mixed> | AnonymousResourceCollection | JsonResource  $data
     */
    public function resolveSuccessResponse(string $message, array | Collection | AnonymousResourceCollection | JsonResource $data = [], int $status = Response::HTTP_OK): JsonResponse
    {
        return response()->json(
            data: [
                'status' => 'success',
                'message' => $message,
                'data' => $data,
            ],
            status: $status,
        );
    }

    /**
     * @param  array<string, mixed> | Collection<string, mixed> | AnonymousResourceCollection | JsonResource  $errors
     */
    public function resolveFailedResponse(string $message, array | Collection | AnonymousResourceCollection | JsonResource $errors = [], int $status = Response::HTTP_NOT_FOUND): JsonResponse
    {
        return response()->json(
            data: [
                'status' => 'error',
                'message' => $message,
                'errors' => $errors,
            ],
            status: $status,
        );
    }
}
