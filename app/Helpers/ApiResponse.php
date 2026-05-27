<?php

namespace App\Helpers;

class ApiResponse
{
    public static function success(
        $data = null,
        $message = 'Sucesso',
        $status = 200
    ) {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ], $status);
    }

    public static function error(
        $message = 'Erro',
        $status = 400
    ) {
        return response()->json([
            'success' => false,
            'message' => $message
        ], $status);
    }
}