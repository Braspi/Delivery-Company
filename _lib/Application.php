<?php

use _lib\router\Router;
use Jenssegers\Blade\Blade;

class Application{
    private Router $router;
    public Blade $blade;

    public function __construct() {
        $this->router = new Router($this);
    }

    public function enableRouting(closure $router): Application {
        call_user_func($router, $this->router);
        return $this;
    }
    public function enableBladeEngine(closure $engine = null): Application {
        $this->blade = new Blade("views", "cache");
        if ($engine != null) call_user_func($engine, $this->blade);
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