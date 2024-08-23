<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\LoginAction;
use App\Concerns\ApiResponse;
use App\DataTransferObjects\Auth\LoginData;
use App\Http\Requests\Auth\LoginRequest;
use CuyZ\Valinor\Mapper\MappingError;
use Illuminate\Http\JsonResponse;
use Throwable;

class LoginController
{
    use ApiResponse;

    /**
     * @throws MappingError|Throwable
     */
    public function __invoke(LoginRequest $request): JsonResponse
    {
        $data = LoginAction::resolve()->execute(
            data: LoginData::resolve(data: $request->validated())
        );

        return $this->resolveSuccessResponse(
            message: 'Login successful',
            data: $data,
        );
    }
}
