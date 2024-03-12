<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login()
    {
        $requiredPostData = ['login_user', 'password_user'];
        foreach ($requiredPostData as $postData) {
            if (is_null(request($postData))) {
                return response()->json([
                    'status' => 'erreur',
                    'message' => $postData . " est obligatoire !"
                ]);
            }
        }
        $data = ['username' => request('login_user'), 'password' => request('password_user')];
        // Verification de la connexion
        $user = auth()->attempt($data);

        if ($user) {
            $data = auth()->user();
            $accessToken = $data->createToken('authToken')->accessToken;
            return response()->json([
                'result' => $data,
                'status' => 'success',
                'message' => 'Opération effectuée avec succès',
                'accessToken' => $accessToken
            ]);
        } else {
            return response()->json([
                'status' => 'erreur',
                'message' => 'Login ou mot de passe incorrect'
            ]);
        }
    }



    public function updatePassword()
    {
        $requiredPostData = ['old_password', 'new_password', 'confirm_password'];
        foreach ($requiredPostData as $postData) {
            if (is_null(request($postData))) {
                return response()->json([
                    'status' => 'erreur',
                    'message' => $postData . " est obligatoire !"
                ]);
            }
        }

        if (request('new_password') === request('confirm_password')) {
            if (Hash::check(request('old_password'), auth()->user()->password)) {
                $update = User::where('id', auth()->user()->id)->first()->update([
                    'password' => bcrypt(request('new_password'))
                ]);
                if ($update) {
                    return response()->json([
                        'status' => 'success',
                        'message' => "Opération effectuée avec succès !"
                    ]);
                } else {
                    return response()->json([
                        'status' => 'erreur',
                        'message' => "Une erreur est survenu lors de l'opération !"
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 'erreur',
                    'message' => "L'ancien mot de passe est incorrect !"
                ]);
            }
        } else {
            return response()->json([
                'status' => 'erreur',
                'message' => 'Mauvaise confirmation du nouveau mot de passe !'
            ]);
        }
    }
}
