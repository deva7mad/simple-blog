<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class APIController extends Controller
{

    /**
     * @param $data
     * @param string $message
     * @param int $status
     * @return JsonResponse
     */
    public function response($data, string $message = '', int $status = 200): JsonResponse
    {
        return response()->json(['status' => $status, 'message' => $message, 'data' => $data], $status, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * @param array $data
     * @param array $errors
     * @param string $message
     * @param int $status
     * @return JsonResponse
     */
    public function errorResponse(array $data, array $errors, string $message, int $status = 422): JsonResponse
    {
        return response()->json(['status' => $status, 'message' => $message, 'data' => $data, 'errors' => $this->formatValidationErrors($errors)]);

    }


    /**
     * @param array $errors
     * @return array
     */
    private function formatValidationErrors(array $errors): array
    {
        return array_values($errors);
    }
}
