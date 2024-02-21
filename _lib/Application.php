<?php

use _lib\router\Router;
use Jenssegers\Blade\Blade;

class Application{
    private Router $router;
    public Blade $blade;

    public function __construct() {
        $this->router = new Router($this);
    }

    public function enableValidation(): Application {
        include_once '_lib/validation/validation.php';
        return $this;
    }
    public function enableDatabase(array $config): Application {
        include_once "database/Database.php";
        $database = new Database($config);
        define("_lib_db_connection", $database);
        return $this;
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