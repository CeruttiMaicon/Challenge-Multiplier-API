<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\RequestCreateUser;
use App\Http\Requests\RequestUpdateUser;

class UserController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials))
            {
                return response()->json([
                    'success' => false,
                    'error' => trans('auth.failed')
                ], 400);
            }
        } catch (JWTException $e)
        {
            return response()->json([
                'success' => false,
                'error' => trans('auth.could_not_create_token')
            ], 500);
        }

        return response()->json([
            'success' => true,
            'token' => $token
        ]);
    }

    public function store(RequestCreateUser $request)
    {
        try {
            $user = new User;

            $user = $user->store($request);

            Log::channel('mysql')->info('O usuário ' . \Auth::user()->name . ' [' . \Auth::user()->email . ']' . ' registrou no sistema o usuário ' . $user->name . ' [' . $user->email . '].');

            return response()->json([
                'success' => true,
                'message' => trans('message.store_user'),
                'data' => $user,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => trans('message.error_store_user'),
                'error_message' => $e->getMessage()
            ]);
        }
    }

    public function update(RequestUpdateUser $request)
    {
        try {
            $user = new User;
            $user = $user->edit($request);

            Log::channel('mysql')->info('O usuário ' . \Auth::user()->name . ' [' . \Auth::user()->email . ']' . ' atualizou no sistema o usuário ' . $user->name . ' [' . $user->email . '].');

            return response()->json([
                'success' => true,
                'message' => trans('message.update_user'),
                'data' => $user,
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => trans('message.error_update_user'),
                'error_message' => $e->getMessage()
            ]);
        }
    }

    public function getAuthenticatedUser()
    {
        try {
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }

        return response()->json(compact('user'));
    }

    public function get($id)
    {
        try {
            return response()->json([
                'success' => true,
                'data' => User::findOrFail($id)->first()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => trans('message.error_get_user'),
                'error_message' => $e->getMessage()
            ]);
        }
    }

    public function getAll()
    {
        try {
            return response()->json([
                'success' => true,
                'data' => User::all()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => trans('message.error_getAll_user'),
                'error_message' => $e->getMessage()
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $user = new User;

            $user = $user->findOrFail($id);

            User::destroy($id);

            Log::channel('mysql')->info('O usuário ' . \Auth::user()->name . ' [' . \Auth::user()->email . ']' . ' deletou o usuário ' . $user->name . ' [' . $user->email . '].');

            return response()->json([
                'success' => true,
                'message' => trans('message.destroy_user'),
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => trans('message.error_destroy_user'),
                'error_message' => $e->getMessage()
            ], 200);
        }
    }
}
