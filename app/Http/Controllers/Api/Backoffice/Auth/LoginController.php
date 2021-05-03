<?php

namespace App\Http\Controllers\Api\Backoffice\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $fieldType = filter_var($request->usermail, FILTER_VALIDATE_EMAIL) ? 'email' : (is_numeric($request->usermail) ? 'phone' : 'username');
        $fieldValue = $request->usermail;

        if ($fieldType == "phone") {
            if (str_contains($fieldValue, '+')) {
                $fieldValue = '00' . ltrim($fieldValue);
            } else if (!str_contains($fieldValue, '00')) {
                $fieldValue = '00' . $fieldValue;
            } else if ($fieldValue[0] == "0") {
                $fieldValue = '00212' . ltrim($fieldValue);
            }
        }

        $user = User::where($fieldType, $fieldValue)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('Laravel Password Grant Client');
                return response([
                    'access_token' => $token->accessToken,
                    'token_type' => 'Bearer',
                    'expires_at' => Carbon::parse($token->token->expires_at)->toDateTimeString(),
                    "user" => $user
                ], 200);
            } else {
                $response = ["message" => "Wrong Credentials"];
                return response($response, 422);
            }
        } else {
            $response = ["message" => 'Wrong Credentials'];
            return response($response, 422);
        }
    }
}
