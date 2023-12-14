<?php
namespace utils\router;

class RouterCall{
    function respond(string $text): void{
        echo $text;
    }
    function status(int $code): void{
        http_response_code($code);
    }
    function json($data): void{
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }
    function respondWithCode(string $text, int $code): void{
        echo $text;
        http_response_code($code);
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
    function render(string $path, array $params = array()): void{
        extract($params);
        include root_path . "/views/$path.view.php";
    }
    function end(): void {
        exit;
    }
}