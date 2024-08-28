<?php

namespace App\Exceptions;

use App\Enums\HttpStatus;
use Exception;

class EmailAlreadyVerifiedException extends Exception
{
    public function __construct()
    {
        parent::__construct(message: 'Email already verified.', code: HttpStatus::UnprocessableEntity->value);
    }
}
