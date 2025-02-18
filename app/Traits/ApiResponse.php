<?php

namespace App\Traits;

trait ApiResponse {

    protected function ok($message) {
        
        return $this->success($message, 200);
    }
    
    protected function success($message, $statusCode = 200) {
        
        return response()->json([
            'message' => $message,
        ], $statusCode);
    }

    protected function error($message, $statusCode = 400)
    {
        return response()->json([
            'message' => $message,
        ], $statusCode);
    }
}