<?php

namespace Pc\AgriConnect\Core;

class Router {
    private array $routes = [];
    private string $basePath = '';

    public function __construct(string $basePath = '') {
        $this->basePath = rtrim($basePath, '/');
    }

    public function get(string $path, string $controller, string $method): void {
        $this->addRoute('GET', $path, $controller, $method);
    }

    public function post(string $path, string $controller, string $method): void {
        $this->addRoute('POST', $path, $controller, $method);
    }

    private function addRoute(string $httpMethod, string $path, string $controller, string $method): void {
        $pattern = $this->convertPathToRegex($path);
        $this->routes[] = [
            'method' => $httpMethod,
            'pattern' => $pattern,
            'controller' => $controller,
            'action' => $method,
            'params' => []
        ];
    }

    private function convertPathToRegex(string $path): string {
        $pattern = preg_replace('/\{([^}]+)\}/', '([^/]+)', $path);
        return '#^' . $this->basePath . $pattern . '$#';
    }

    public function dispatch(): void {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $requestUri = rtrim($requestUri, '/');
        
        // Ensure root path is handled correctly
        if ($requestUri === '') {
            $requestUri = '/';
        }

        foreach ($this->routes as $route) {
            if ($route['method'] === $requestMethod && preg_match($route['pattern'], $requestUri, $matches)) {
                array_shift($matches);
                $route['params'] = $matches;
                
                $controllerClass = "Pc\\AgriConnect\\Controllers\\{$route['controller']}";
                if (class_exists($controllerClass)) {
                    $controller = new $controllerClass();
                    if (method_exists($controller, $route['action'])) {
                        call_user_func_array([$controller, $route['action']], $route['params']);
                        return;
                    }
                }
            }
        }

        http_response_code(404);
        $this->render404();
    }

    private function render404(): void {
        echo '<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page non trouvée - AgriConnect</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="text-center">
            <h1 class="text-6xl font-bold text-green-600 mb-4">404</h1>
            <p class="text-xl text-gray-600 mb-8">Page non trouvée</p>
            <a href="/" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition">
                Retour à l\'accueil
            </a>
        </div>
    </div>
</body>
</html>';
    }
}

