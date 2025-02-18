<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ApiResponse;

class AuthController extends Controller
{
    use ApiResponse;
    public function login() {

        return $this->ok('Hello, Login!');
    }

    public function loginError()
    {
        return $this->error('Invalid credentials', 401);
    }
}
