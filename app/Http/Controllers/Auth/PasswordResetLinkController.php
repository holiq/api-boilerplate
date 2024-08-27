<?php

namespace App\Http\Controllers\Auth;

use App\Concerns\ApiResponse;
use App\Http\Requests\Auth\PasswordResetRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class PasswordResetLinkController
{
    use ApiResponse;

    public function __invoke(PasswordResetRequest $request): JsonResponse
    {
        $status = Password::sendResetLink($request->validated());

        if ($status != Password::RESET_LINK_SENT) {
            throw ValidationException::withMessages([
                'email' => [__($status)],
            ]);
        }

        return $this->resolveSuccessResponse(message: __($status));
    }
}
