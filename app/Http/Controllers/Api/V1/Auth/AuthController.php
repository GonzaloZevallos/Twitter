<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Actions\Fortify\PasswordValidationRules;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Jetstream\Jetstream;

/**
 * @method createTeam(User $user)
 */
class AuthController extends Controller
{
    use PasswordValidationRules;

    public function register(Request $request): \Illuminate\Http\JsonResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ]);

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password'))
        ], function (User $user) {
            $this->createTeam($user);
        });

        return response()->json($user, 200);
    }

//    public function register() {
//
//    }
}
