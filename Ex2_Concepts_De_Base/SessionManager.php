<?php

class SessionManager {
    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function incrementVisitCount() {
        if (!isset($_SESSION['visit_count'])) {
            $_SESSION['visit_count'] = 1;
        } else {
            $_SESSION['visit_count']++;
        }
    }

    public function getVisitCount() {
        return $_SESSION['visit_count'] ?? 0;
    }

    public function resetSession() {
        session_unset();
        session_destroy();
    }
}
