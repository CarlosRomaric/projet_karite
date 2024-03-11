<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * La fonction PHP `login` gère l'authentification des utilisateurs en vérifiant le nom
     * d'utilisateur et le mot de passe fournis, en générant un jeton d'accès en cas de connexion
     * réussie et en renvoyant les réponses JSON appropriées.
     *
     * @return La fonction `login()` renvoie une réponse JSON basée sur les conditions vérifiées dans
     * la fonction.
     */
    public function login()
    {
        if (is_null(request('login_user'))) {
            return response()->json([
                'statut' => 'erreur',
                'message' => 'Le nom utilisateur est obligatoire !'
            ]);
        }
        if (request('password_user') == NULL) {
            return response()->json([
                'statut' => 'erreur',
                'message' => 'Le mot de passe est obligatoire !'
            ]);
        }
        $data = ['nom_utilisateur' => request('login_user'), 'password' => request('password_user')];
        // Verification de la connexion
        $user = auth()->attempt($data);

        if ($user) {
            $data = auth()->user();
            $accessToken = $data->createToken('authToken')->accessToken;
            return response()->json([
                'resultat' => $data,
                'statut' => 'succes',
                'message' => 'Opération effectuée avec succès',
                'accessToken' => $accessToken
            ]);
        } else {
            return response()->json([
                'statut' => 'erreur',
                'message' => 'Login ou mot de passe incorrect'
            ]);
        }
    }
}
