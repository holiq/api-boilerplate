<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\LoginAction;
use App\DataTransferObjects\Auth\LoginData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use CuyZ\Valinor\Mapper\MappingError;
use Throwable;

class LoginController extends Controller
{
    /**
     * @return array<string, mixed>
     *
     * @throws MappingError|Throwable
     */
    public function __invoke(LoginRequest $request): array
    {
        return LoginAction::resolve()->execute(
            data: LoginData::resolve(data: $request->validated())
        );
    }
}
