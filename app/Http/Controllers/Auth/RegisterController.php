<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\RegisterAction;
use App\DataTransferObjects\Auth\RegisterData;
use App\Http\Requests\Auth\RegisterRequest;
use CuyZ\Valinor\Mapper\MappingError;

class RegisterController
{
    /**
     * @return array<string, mixed>
     *
     * @throws MappingError
     */
    public function __invoke(RegisterRequest $request): array
    {
        return RegisterAction::resolve()->execute(
            data: RegisterData::resolve(data: $request->validated())
        );
    }
}
