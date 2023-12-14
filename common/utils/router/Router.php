<?php
namespace utils\router;
require_once 'common/utils/router/HttpMethod.php';
use Closure;
use Exception;

class Router {
    protected array $routes = [];

    public function get(string $url, closure $target, HttpGuard... $guards): void {
        $this->route(HttpMethod::GET, $url, $target, $guards);
    }
    public function post(string $url, closure $target, HttpGuard... $guards): void {
        $this->route(HttpMethod::POST, $url, $target, $guards);
    }
    public function delete(string $url, closure $target, HttpGuard... $guards): void {
        $this->route(HttpMethod::DELETE, $url, $target, $guards);
    }
    public function put(string $url, closure $target, HttpGuard... $guards): void {
        $this->route(HttpMethod::PUT, $url, $target, $guards);
    }
    public function any(string $url, closure $target, HttpGuard... $guards): void {
        $this->route(HttpMethod::ANY, $url, $target, $guards);
    }

    public function controllers(Controller... $controllers): void{
        foreach ($controllers as $controller) {
            $controller->routes($this);
        }
    }

    public function matchRoute(): void{
        $method = HttpMethod::fromRequest();
        $url = $_SERVER['REQUEST_URI'];
        if (isset($this->routes[$method->name])) {
            foreach ($this->routes[$method->name] as $routeUrl => $data) {
                $pattern = preg_replace('/\/:([^\/]+)/', '/(?P<$1>[^/]+)', $routeUrl);
                $routerCall = new RouterCall();
                $params = array($routerCall);
                if (preg_match('#^' . $pattern . '$#', $url, $matches)) {
                    $params = array_merge($params, array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY));
                    if (count($data['guards']) > 0){
                        foreach ($data['guards'] as $guard) {
                            if(!$guard->canActivate($routerCall)) exit();
                        }
                    }
                    call_user_func_array($data['target'], $params);
                    return;
                }
            }
        }
        if (isset($this->routes[HttpMethod::EXCEPTION_HANDLER->name])) {
            $target = $this->routes[HttpMethod::EXCEPTION_HANDLER->name]['handler_exception'];
            call_user_func_array($target, array(new RouterCall()));
        } else throw new Exception('Route not found');
    }
    function error(closure $target): void{
        $this->routes[HttpMethod::EXCEPTION_HANDLER->name]["handler_exception"] = $target;
    }
    private function route(HttpMethod $method, string $url, closure $target, array $guards): void{
        $this->routes[$method->name][$url] = array(
            "target" => $target,
            "guards" => $guards
        );
    }
}