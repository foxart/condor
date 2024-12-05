<?php

namespace common;
class Router
{
    private array $routes = [];

    public function get(string $path, callable $handler): void
    {
        $this->add('GET', $path, $handler);
    }

    public function add(string $method, string $path, callable $handler): void
    {
        $this->routes[] = [
            'method' => strtoupper($method),
            'path' => $this->convertPathToRegex($path),
            'handler' => $handler
        ];
    }

    private function convertPathToRegex(string $path): string
    {
        return '/^' . preg_replace('/\{(\w+)\}/', '(?P<\1>[^\/]+)', str_replace('/', '\/', $path)) . '$/';
    }

    public function post(string $path, callable $handler): void
    {
        $this->add('POST', $path, $handler);
    }

    public function dispatch(string $requestUri, string $requestMethod): void
    {
        $requestMethod = strtoupper($requestMethod);
        $requestUri = parse_url($requestUri, PHP_URL_PATH);
        foreach ($this->routes as $route) {
            if ($route['method'] === $requestMethod && preg_match($route['path'], $requestUri, $matches)) {
                $params = array_filter($matches, fn($key) => !is_numeric($key), ARRAY_FILTER_USE_KEY);
                call_user_func_array($route['handler'], $params);
                return;
            }
        }
        http_response_code(404);
        echo "404 Not Found";
    }
}
