<?php
namespace utils\router;

use utils\validation\Validated;
use utils\validation\Validation;
use Closure;
class RouterCall{
    function respond(mixed $text): void{
        print_r($text);
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

    /**
     * @template T of object
     * @psalm-param class-string<T> $dto
     * @param class-string<T> $dto
     * @return T
     */
    function validatedBody(mixed $dto) {
        $dto->body($this->body());
        $state = new Validation($dto);
        $state->execute($this);
        return $dto;
    }
    function render(string $path, array $params = array()): void{
        extract($params);
        include root_path . "/views/$path.view.php";
    }
    function redirect(string $path): void{
        header("Location: $path");
        die();
    }
    function end(): void {
        exit;
    }
}