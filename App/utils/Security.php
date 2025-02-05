<?php
class Security {
    public static function sanitizeString($string) {
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }

    public static function generateCsrfToken() {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        $token = bin2hex(random_bytes(32));
        $_SESSION['csrf_token'] = $token;
        return $token;
    }

    public static function verifyCsrfToken($token) {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        return hash_equals($_SESSION['csrf_token'], $token);
    }
}
