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
        
        // Routes importantes à déboguer
        $importantRoutes = ['/', '/marketplace', '/land-rental', '/login', '/register/farmer', '/register/buyer'];
        
        echo "<!-- DEBUG: Request Method: " . $requestMethod . " -->";
        echo "<!-- DEBUG: Request URI: '" . $requestUri . "' -->";
        echo "<!-- DEBUG: Base Path: '" . $this->basePath . "' -->";
        echo "<!-- DEBUG: Routes count: " . count($this->routes) . " -->";
        
        // Vérifier si c'est une route importante
        if (in_array($requestUri, $importantRoutes)) {
            echo "<!-- DEBUG: *** ROUTE IMPORTANTE DETECTEE: " . $requestUri . " *** -->";
        }

        foreach ($this->routes as $index => $route) {
            $routePath = str_replace('#^' . $this->basePath, '', $route['pattern']);
            $routePath = str_replace('$#', '', $routePath);
            
            echo "<!-- DEBUG: Route $index: " . $route['method'] . " " . $routePath . " (pattern: " . $route['pattern'] . ") -> " . $route['controller'] . "::" . $route['action'] . " -->";
            
            // Débogage détaillé pour les routes importantes
            if (in_array($routePath, $importantRoutes) || in_array($requestUri, $importantRoutes)) {
                echo "<!-- DEBUG: *** VERIFICATION ROUTE $index *** -->";
                echo "<!-- DEBUG: Method match: " . ($route['method'] === $requestMethod ? 'YES' : 'NO') . " -->";
                echo "<!-- DEBUG: Pattern test: " . $route['pattern'] . " against '" . $requestUri . "' -->";
                if (preg_match($route['pattern'], $requestUri, $matches)) {
                    echo "<!-- DEBUG: Regex match: YES -->";
                    echo "<!-- DEBUG: Matches: " . json_encode($matches) . " -->";
                } else {
                    echo "<!-- DEBUG: Regex match: NO -->";
                }
            }
            
            if ($route['method'] === $requestMethod && preg_match($route['pattern'], $requestUri, $matches)) {
                echo "<!-- DEBUG: *** ROUTE $index MATCHED! *** -->";
                array_shift($matches);
                $route['params'] = $matches;
                
                $controllerClass = "Pc\\AgriConnect\\Controllers\\{$route['controller']}";
                echo "<!-- DEBUG: Controller class: " . $controllerClass . " -->";
                echo "<!-- DEBUG: Class exists: " . (class_exists($controllerClass) ? 'YES' : 'NO') . " -->";
                
                if (class_exists($controllerClass)) {
                    $controller = new $controllerClass();
                    echo "<!-- DEBUG: Method: " . $route['action'] . " -->";
                    echo "<!-- DEBUG: Method exists: " . (method_exists($controller, $route['action']) ? 'YES' : 'NO') . " -->";
                    
                    if (method_exists($controller, $route['action'])) {
                        echo "<!-- DEBUG: *** APPEL DE LA METHODE " . $route['action'] . " *** -->";
                        call_user_func_array([$controller, $route['action']], $route['params']);
                        return;
                    } else {
                        echo "<!-- DEBUG: ERROR: Method " . $route['action'] . " does not exist -->";
                    }
                } else {
                    echo "<!-- DEBUG: ERROR: Controller class " . $controllerClass . " does not exist -->";
                }
            }
        }

        echo "<!-- DEBUG: *** AUCUNE ROUTE MATCH - RENDER 404 *** -->";
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

