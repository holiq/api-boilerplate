<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\RegisterAction;
use App\Concerns\ApiResponse;
use App\DataTransferObjects\Auth\RegisterData;
use App\Enums\HttpStatus;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\JsonResponse;

class RegisterController
{
    use ApiResponse;

    /**
     * @throws \CuyZ\Valinor\Mapper\MappingError
     */
    public function __invoke(RegisterRequest $request): JsonResponse
    {
        $data = RegisterAction::resolve()->execute(
            data: RegisterData::resolve(data: $request->validated())
        );

        return $this->resolveSuccessResponse(
            message: 'Registration successful',
            data: $data,
            status: HttpStatus::Created,
        );
    }
}
