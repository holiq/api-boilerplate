<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\ResendEmailVerificationAction;
use App\Concerns\ApiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ResendEmailVerificationController extends Controller
{
    use ApiResponse;

    public function __invoke(Request $request): JsonResponse
    {
        ResendEmailVerificationAction::resolve()->execute($request);

        return $this->resolveSuccessResponse(message: 'Email verification link sent.');
    }
}
