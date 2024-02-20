<?php
use _lib\router\Component;

class ButtonComponent extends Component {
    public function __construct(
        public string $title,
        public string $id,
        public string $class = ""
    ) {}

    #[\Override] function path(): string {
        return "components.button";
    }
    #[\Override] function params(): array {
        return array(
            "title" => $this->title,
            "id" => $this->id,
            "class" => $this->class
        );
    }
}