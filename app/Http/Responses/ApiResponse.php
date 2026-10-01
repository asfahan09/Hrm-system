<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ApiResponse
{
    public static function success(mixed $data = null, string $message = "", int $code = Response::HTTP_OK): JsonResponse
    {
        return response()->json([
            'data' => $data,
            'message' => $message,

        ], $code);
    }

    public static function error(string $message = "", int $code = Response::HTTP_BAD_REQUEST, mixed $errors = null): JsonResponse
    {
        return response()->json([
            'errors' => $errors,
            'message' => $message,
        ], $code);
    }
    public static function created(mixed $data = null, string $message = "Resource Created Successfully", int $code = Response::HTTP_CREATED): JsonResponse
    {
        return self::success($data, $message, $code);
    }

    public static function notfound(mixed $message = "not found", int $code = Response::HTTP_NOT_FOUND): JsonResponse
    {
        return self::error($message, Response::HTTP_NOT_FOUND, $code);
    }

    public static function unauthorized(string $message = "unauthorized", int $code = Response::HTTP_UNAUTHORIZED): JsonResponse
    {
        return self::error($message, Response::HTTP_UNAUTHORIZED, $code);
    }

    public static function forbidden(string $message = "Forbidden", int $code = Response::HTTP_FORBIDDEN): JsonResponse
    {
        return self::error($message, Response::HTTP_FORBIDDEN, $code);
    }
}
