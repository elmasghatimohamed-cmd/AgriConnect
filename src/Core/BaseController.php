<?php

namespace Pc\AgriConnect\Core;

class BaseController {
    protected function render(string $view, array $data = []): void {
        extract($data);
        
        $viewPath = __DIR__ . '/../Views/' . str_replace('.', '/', $view) . '.php';
        
        if (!file_exists($viewPath)) {
            throw new \Exception("View file not found: {$viewPath}");
        }
        
        ob_start();
        include $viewPath;
        $content = ob_get_clean();
        
        echo $content;
    }

    protected function json(array $data, int $statusCode = 200): void {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    protected function redirect(string $url): void {
        header("Location: {$url}");
        exit;
    }

    protected function getSession(string $key = null) {
        if ($key === null) {
            return $_SESSION;
        }
        return $_SESSION[$key] ?? null;
    }

    protected function setSession(string $key, $value): void {
        $_SESSION[$key] = $value;
    }

    protected function removeSession(string $key): void {
        unset($_SESSION[$key]);
    }

    protected function flash(string $type, string $message): void {
        $_SESSION['flash'][$type] = $message;
    }

    protected function getFlash(string $type): ?string {
        $message = $_SESSION['flash'][$type] ?? null;
        unset($_SESSION['flash'][$type]);
        return $message;
    }

    protected function isLoggedIn(): bool {
        return isset($_SESSION['user']['logged_in']) && $_SESSION['user']['logged_in'] === true;
    }

    protected function getUser(): ?array {
        return $this->getSession('user');
    }

    protected function requireAuth(): void {
        if (!$this->isLoggedIn()) {
            $this->flash('error', 'Vous devez être connecté pour accéder à cette page.');
            $this->redirect('/login');
        }
    }
}

