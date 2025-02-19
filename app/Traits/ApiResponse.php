<?php

namespace App\Traits;

use App\Models\User;


trait ApiResponse {

    protected function ok($message) {
        
        return $this->success($message, 200);
    }
    
    protected function success($message, $statusCode = 200) {
        $user = User::findOrFail(1);
        $token =  $user->createToken('MyApp')->plainTextToken;

        return response()->json([
            'message' => $message,
            'token' => $token
        ], $statusCode);
    }

    protected function error($message, $statusCode = 400)
    {
        return response()->json([
            'message' => $message,
        ], $statusCode);
    }
}