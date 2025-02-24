<?php
namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function update(Request $request, User $user)
    {
        // Validate incoming data (you can adjust the validation rules)
        $validatedData = $request->validate([
            'name' => 'string|string|max:255',
            'email' => 'string|email|max:255',
            'password' => 'string|string|min:8',
        ]);

        // Update only the fields that were passed in the request
        $user->update($validatedData);

        // Return the updated user as a response
        return response()->json($user, 200);
    }
}