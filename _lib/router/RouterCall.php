<?php
namespace _lib\router;

use _lib\validation\Validation;
use Closure;
use Jenssegers\Blade\Blade;

class RouterCall{
     private array $view_params;
     private array $path_params;
     private Blade $blade;

     public function __construct(
         Blade $blade,
         array $view_params = array(),
         ?array $path_params = array()
     ){
         $this->view_params = $view_params;
         $this->path_params = $path_params;
         $this->blade = $blade;
     }

    function respond(mixed $text): void{
        print_r($text);
    }
    function status(int $code): RouterCall{
        http_response_code($code);
        return $this;
    }
    function json($data): void{
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }
    function respondWithCode(string $text, int $code): void{
        echo $text;
        http_response_code($code);
    }
    function pathParam(string $key): mixed {
        return $this->path_params[$key];
    }
    function parameters(): array{
        parse_str($_SERVER['QUERY_STRING'], $parameters);
        return $parameters;
    }
    function headers(): array{
        return getallheaders();
    }
    function header(string $key): string{
        return $this->headers()[$key];
    }
    function body(){
        return json_decode(file_get_contents('php://input'), true);
    }

    /**
     * @template T of object
     * @psalm-param class-string<T> $dto
     * @param class-string<T> $dto
     * @return T
     */
    function validatedBody(mixed $dto) {
        $state = new Validation($dto, $this->body());
        $state->execute($this);
        return $dto;
    }
    function render(string $path, array $params = array()): void
    {
        echo $this->blade->render($path, $params);
//        $params = array_merge($params, $this->view_params);
//        if (isset($params['layout'])) {
//            extract($params);
//            $params['_CONTENT'] = root_path . "/views/$path.view.php";
//        }
//        extract($params);
//        if (isset($params['layout'])) include root_path . "/views/layouts/{$params['layout']}.layout.php";
//        else include root_path . "/views/$path.view.php";
    }
    function redirect(string $path): void{
        header("Location: $path");
        die();
    }
    function end(): void {
        exit;
    }
}

function view(string $template, array $params = array()): closure {
    return fn(RouterCall $call) => $call->render($template, $params);
}