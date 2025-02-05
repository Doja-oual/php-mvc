<?php

class AuthController {
    public function login() {
        $csrfToken = Security::generateCsrfToken();
        // Afficher le formulaire de connexion avec le jeton CSRF
    }

    public function authenticate() {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (!Validator::validateEmail($email) || !Validator::validatePassword($password)) {
            http_response_code(400);
            echo "Email ou mot de passe invalide.";
            return;
        }

        // Procéder à l'authentification de l'utilisateur
    }

    public function logout() {
        Session::destroy();
        // Rediriger vers la page de connexion ou d'accueil
    }
}
