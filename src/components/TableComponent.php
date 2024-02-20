<?php
use _lib\router\Component;

class TableComponent extends Component {
    public function __construct(
        public array $headers,
        public array $items,
        public closure $formatter
    ) {}

    #[\Override] function path(): string {
        return "components.table";
    }
    #[\Override] function params(): array {
        return array(
            "headers" => $this->headers,
            "items" => $this->items,
            "formatter" => $this->formatter
        );
    }
}