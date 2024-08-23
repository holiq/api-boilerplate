<?php

namespace App\Enums;

enum HttpStatus: int
{
    case OK = 200;
    case Created = 201;
    case Accepted = 202;
    case NoContent = 204;
    case BadRequest = 400;
    case Unauthorized = 401;
    case Forbidden = 403;
    case NotFound = 404;
    case MethodNotAllowed = 405;
    case RequestTimeout = 408;
    case Conflict = 409;
    case UnprocessableEntity = 422;
    case TooManyRequests = 429;
    case InternalServerError = 500;
    case NotImplemented = 501;
    case BadGateway = 502;
    case ServiceUnavailable = 503;
    case GatewayTimeout = 504;
}
