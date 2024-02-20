<?php
use _lib\router\Component;

class InputComponent extends Component {
    public function __construct(
        public string $id,
        public string $placeholder,
        public string $type = "text",
        public string $value = "",
        public string $class = ""
    ) {}

    #[\Override] function path(): string {
        return "components.input";
    }
    #[\Override] function params(): array {
        return array(
            "id" => $this->id,
            "placeholder" => $this->placeholder,
            "value" => $this->value,
            "type" => $this->type,
            "class" => $this->class
        );
    }
}