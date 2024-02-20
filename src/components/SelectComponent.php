<?php
use _lib\router\Component;

class SelectComponent extends Component {
    public function __construct(
        public string $page,
        public string $id
    ) {}

    #[\Override] function path(): string {
        return "components.$this->page.select";
    }
    #[\Override] function params(): array {
        return array(
            "id" => $this->id
        );
    }
}