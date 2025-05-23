<?php

namespace App\Helpers;

class ApiResponse
{
    public static function success($data, $message = "Success", $status = 200)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ], $status);
    }

    public static function error($message = "Error", $status = 400)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message
        ], $status);
    }
}
