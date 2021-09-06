<?php

namespace App\Http\Controllers\API\Auth\Admins;

use App\Http\Controllers\JsonApiAuth\Traits\HasToShowApiTokens;
use App\Http\Requests\JsonApiAuth\LoginRequest;
use App\Models\User;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class APIAdminsLoginController
{
    use HasToShowApiTokens;

    public function __invoke(LoginRequest $request): JsonResponse
    {
        try {

            if(Auth::attempt($request->only(['email', 'password']))) {

                /** @var User $user */
                $user = Auth::user();

                if (!$user->isAdmin()) {
                    throw new AuthenticationException('The credentials does not match.');
                }

                return $this->showCredentials(Auth::user());
            }

        } catch (Exception $exception) {

            return response()->json([
                'message' => $exception->getMessage()
            ], 400);

        }

        return response()->json([
            'message' => __('json-api-auth.failed'),
        ], 401);

    }
}
