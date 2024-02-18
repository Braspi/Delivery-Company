<?php
namespace _lib\router;
require_once '_lib/router/HttpGuard.php';
require_once '_lib/router/Controller.php';
require_once '_lib/router/Component.php';
require_once '_lib/router/HttpMethod.php';

use Application;
use Closure;
use Exception;

class Router {
    private Application $application;
    private array $routes = [];
    private array $global_params = [];

    public function __construct(Application $application){
        $this->application = $application;
    }

    public function param(string $key, closure $valueFunc) : Router {
        $value = call_user_func($valueFunc);
        if ($value != null) $this->global_params[$key] = $value;
        return $this;
    }

    public function group(string $path) {

    }

    public function get(string $url, closure $target, HttpGuard... $guards): Router {
        $this->route(HttpMethod::GET, $url, $target, $guards);
        return $this;
    }
    public function post(string $url, closure $target, HttpGuard... $guards): Router {
        $this->route(HttpMethod::POST, $url, $target, $guards);
        return $this;
    }
    public function delete(string $url, closure $target, HttpGuard... $guards): Router {
        $this->route(HttpMethod::DELETE, $url, $target, $guards);
        return $this;
    }
    public function put(string $url, closure $target, HttpGuard... $guards): Router {
        $this->route(HttpMethod::PUT, $url, $target, $guards);
        return $this;
    }
    public function any(string $url, closure $target, HttpGuard... $guards): Router {
        $this->route(HttpMethod::ANY, $url, $target, $guards);
        return $this;
    }

    public function controllers(Controller... $controllers): Router {
        foreach ($controllers as $controller) {
            $controller->routes($this);
        }
        return $this;
    }

    public function matchRoute(): void{
        $method = HttpMethod::fromRequest();
        $url = $_SERVER['REQUEST_URI'];
        if (isset($this->routes[$method->name])) {
            foreach ($this->routes[$method->name] as $routeUrl => $data) {
                $pattern = preg_replace('/\/:([^\/]+)/', '/(?P<$1>[^/]+)', $routeUrl);
                if (preg_match('#^' . $pattern . '$#', $url, $matches)) {
                    $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                    $routerCall = new RouterCall($this->application->blade, $this->global_params, $params);
                    if (count($data['guards']) > 0){
                        foreach ($data['guards'] as $guard) {
                            if(!$guard->canActivate($routerCall)) exit();
                        }
                    }
                    call_user_func($data['target'], $routerCall);
                    return;
                }
            }
        }
        if (isset($this->routes[HttpMethod::EXCEPTION_HANDLER->name])) {
            $target = $this->routes[HttpMethod::EXCEPTION_HANDLER->name]['handler_exception'];
            call_user_func_array($target, array(new RouterCall($this->global_params)));
        } else throw new Exception('Route not found');
    }
    function error(closure $target): Router{
        $this->routes[HttpMethod::EXCEPTION_HANDLER->name]["handler_exception"] = $target;
        return $this;
    }
    private function route(HttpMethod $method, string $url, closure $target, array $guards): void{
        $this->routes[$method->name][$url] = array(
            "target" => $target,
            "guards" => $guards
        );
    }
}