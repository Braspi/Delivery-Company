<?php

use _lib\router\Router;

class Application{
    private Router $router;

    public function __construct() {
        $this->router = new Router($this);
    }

    public function routing(closure $router): Application {
        call_user_func($router, $this->router);
        return $this;
    }
    public function bootstrap(): void {
        try {
            $this->router->matchRoute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}