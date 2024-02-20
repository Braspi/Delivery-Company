<?php
use _lib\router\Component;

class InputComponent extends Component {
    public function __construct(
        public string $id,
        public string $placeholder,
        public string $class = ""
    ) {}

    #[\Override] function path(): string {
        return "components.input";
    }
    #[\Override] function params(): array {
        return array(
            "id" => $this->id,
            "placeholder" => $this->placeholder,
            "class" => $this->class
        );
    }
}