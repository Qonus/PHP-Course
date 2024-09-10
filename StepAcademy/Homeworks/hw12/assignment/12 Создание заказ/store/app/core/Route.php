<?php

class Route {
    private $routes = [];

    public function add($pattern, $callback) {
        $pattern = preg_replace_callback('/\{(\w+)\}/', function($matches) {
            return '(?P<' . $matches[1] . '>[^/]+)';
        }, $pattern);
        $pattern = '#^' . $pattern . '$#';
        $this->routes[$pattern] = $callback;
    }

    public function dispatch($uri) {
        foreach ($this->routes as $pattern => $callback) {
            if (preg_match($pattern, $uri, $params)) {
                $params = array_filter($params, 'is_string', ARRAY_FILTER_USE_KEY);
                return call_user_func_array($callback, $params);
            }
        }
        // 404 Not Found
        http_response_code(404);

        $view = new View();
        $view->render("layouts/not-found", [
            "title" => "Страница не найдена",
        ]);
        
        // echo "404 Not Found";
    }
}
