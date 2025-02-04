<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\Users\Contracts\UserServiceContract;
use Exception;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $userService;

    public function __construct(UserServiceContract $userService)
    {
        $this->userService = $userService;
    }

    public function login(UserRequest $request)
    {
        try {
            $token = $this->userService->login($request);

            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]);
        } catch (Exception) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
