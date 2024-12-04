<?php
class Router {
    private array $routes = [];
    private string $basePath = '';

    public function __construct(string $basePath = '') {
        $this->basePath = rtrim($basePath, '/');
    }

    public function add(string $method, string $path, callable $handler): void {
        $path = $this->basePath . $path;
        $this->routes[] = [
            'method' => strtoupper($method),
            'path' => $this->convertPathToRegex($path),
            'handler' => $handler
        ];
    }

    public function get(string $path, callable $handler): void {
        $this->add('GET', $path, $handler);
    }

    public function post(string $path, callable $handler): void {
        $this->add('POST', $path, $handler);
    }

    public function dispatch(string $requestUri, string $requestMethod): void {
        $requestMethod = strtoupper($requestMethod);
        $requestUri = parse_url($requestUri, PHP_URL_PATH);

        foreach ($this->routes as $route) {
            if ($route['method'] === $requestMethod && preg_match($route['path'], $requestUri, $matches)) {
                array_shift($matches); // Удаляем первый элемент, т.к. это весь путь
                call_user_func_array($route['handler'], $matches);
                return;
            }
        }

        // Если маршрут не найден, возвращаем 404
        http_response_code(404);
        echo "404 Not Found";
    }

    private function convertPathToRegex(string $path): string {
        // Заменяем параметры в пути на регулярные выражения
        return '/^' . preg_replace('/\{(\w+)\}/', '(?P<\1>[^\/]+)', str_replace('/', '\/', $path)) . '$/';
    }
}