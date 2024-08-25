<?php

namespace App\Http\Controllers\Auth;

use App\Concerns\ApiResponse;
use App\Enums\HttpStatus;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ResendEmailVerificationController extends Controller
{
    use ApiResponse;

    public function __invoke(Request $request): JsonResponse
    {
        /** @var User $user */
        $user = $request->user();

        if ($user->hasVerifiedEmail()) {
            return $this->resolveFailedResponse(message: 'Email already verified.', status: HttpStatus::UnprocessableEntity);
        }

        $user->sendEmailVerificationNotification();

        return $this->resolveSuccessResponse(message: 'Email verification link sent.');
    }
}
