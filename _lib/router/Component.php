<?php
namespace _lib\router;

abstract class Component {
    abstract function path(): string;
    abstract function params(): array;

    public function __toString(): string {
        echo gblade->render($this->path(), $this->params());
        return "";
    }
}