<?php
class Router {
    protected array $routes = [];

    public function route(string $method, string $url, closure $target) {
        $this->routes[$method][$url] = $target;
    }

    public function matchRoute() {
        $method = $_SERVER['REQUEST_METHOD'];
        $url = $_SERVER['REQUEST_URI'];
        if (isset($this->routes[$method])) {
            foreach ($this->routes[$method] as $routeUrl => $target) {
                $pattern = preg_replace('/\/:([^\/]+)/', '/(?P<$1>[^/]+)', $routeUrl);
                $params = array(new Response());
                if (preg_match('#^' . $pattern . '$#', $url, $matches)) {
                    $params = array_merge($params, array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY));
                    call_user_func_array($target, $params);
                    return;
                }
            }
        }
        if (isset($this->routes['HANDLER_EXCEPTION'])) {
            $target = $this->routes['HANDLER_EXCEPTION']['handler_exception'];
            call_user_func_array($target, array(new Response()));
        } else throw new Exception('Route not found');
    }
    function error(closure $target) {
        $this->routes['HANDLER_EXCEPTION']["handler_exception"] = $target;
    }
}

class Response {
    function respond(string $text) {
        echo $text;
    }
    function respondWithCode(string $text, int $code){
        echo $text;
        http_response_code($code);
    }
    function parameters(): array {
        parse_str($_SERVER['QUERY_STRING'], $parameters);
        return $parameters;
    }
    function headers(){
        return getallheaders();
    }
    function header(string $key): string {
        return $this->headers()[$key];
    }
    function body(){
        return json_decode(file_get_contents('php://input'), true);
    }
    function render(string $path, array $params = array()) {
        extract($params);
        include __DIR__ . "/views/$path.view.php";
    }
}