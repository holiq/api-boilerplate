<?php

namespace App\Http\Controllers\Auth;

use App\Concerns\ApiResponse;
use App\Enums\HttpStatus;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\JsonResponse;

class VerifyEmailController extends Controller
{
    use ApiResponse;

    public function __invoke(EmailVerificationRequest $request): JsonResponse
    {
        /** @var User $user */
        $user = $request->user();

        if ($user->hasVerifiedEmail()) {
            return $this->resolveFailedResponse(message: 'Email already verified.', status: HttpStatus::UnprocessableEntity);
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        return $this->resolveSuccessResponse(message: 'Email successfully verified.');
    }
}
