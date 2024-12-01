<?php

namespace App\Concerns;

use App\Enums\HttpStatus;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

trait ApiResponse
{
    /**
     * @param  array<string, mixed> | Collection<string, mixed>  $data
     */
    public function resolveSuccessResponse(string $message, array | Collection $data = [], HttpStatus | int $status = HttpStatus::OK): JsonResponse
    {
        $status = is_int($status) ? $status : $status->value;

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
     * @param  array<string, mixed>  $errors
     */
    public function resolveFailedResponse(string $message, array $errors = [], HttpStatus | int $status = HttpStatus::NotFound): JsonResponse
    {
        $status = is_int($status) ? $status : $status->value;

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
