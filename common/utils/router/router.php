<?php
namespace utils\router;

use Closure;

enum HttpMethod {
    case GET;
    case POST;
    case DELETE;
    case PUT;
}

class Router{
    protected array $routes = [];

    public function route(string $method, string $url, closure $target): void{
        $this->routes[$method][$url] = $target;
    }
//    public function get(string $url, closure $target): void {
//        $this->routes[HttpMethod::GET][$url] = $target;
//    }
    public function post(string $url, closure $target): void {
        $this->routes['GET'][$url] = $target;
    }

    public function matchRoute(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $url = $_SERVER['REQUEST_URI'];
        if (isset($this->routes[$method])) {
            foreach ($this->routes[$method] as $routeUrl => $target) {
                $pattern = preg_replace('/\/:([^\/]+)/', '/(?P<$1>[^/]+)', $routeUrl);
                $params = array(new RouterCall());
                if (preg_match('#^' . $pattern . '$#', $url, $matches)) {
                    $params = array_merge($params, array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY));
                    call_user_func_array($target, $params);
                    return;
                }
            }
        }
        if (isset($this->routes['HANDLER_EXCEPTION'])) {
            $target = $this->routes['HANDLER_EXCEPTION']['handler_exception'];
            call_user_func_array($target, array(new RouterCall()));
        } else throw new Exception('Route not found');
    }

    function error(closure $target): void
    {
        $this->routes['HANDLER_EXCEPTION']["handler_exception"] = $target;
    }
}

class RouterCall
{
    function respond(string $text): void
    {
        echo $text;
    }

    function status(int $code): void
    {
        http_response_code($code);
    }

    function json($data): void
    {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }

    function respondWithCode(string $text, int $code): void
    {
        echo $text;
        http_response_code($code);
    }

    function parameters(): array
    {
        parse_str($_SERVER['QUERY_STRING'], $parameters);
        return $parameters;
    }

    function headers(): array
    {
        return getallheaders();
    }

    function header(string $key): string
    {
        return $this->headers()[$key];
    }

    function body()
    {
        return json_decode(file_get_contents('php://input'), true);
    }

    function render(string $path, array $params = array()): void
    {
        extract($params);
        include root_path . "/views/$path.view.php";
    }

    function end(): void
    {
        exit;
    }
}