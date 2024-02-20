<?php
use _lib\router\Component;

class ModalComponent extends Component {
    public function __construct(
        public string $page,
        public string $action
    ) {}

    #[\Override] function path(): string {
        return "components.$this->page.modals.$this->action";
    }
    #[\Override] function params(): array {
        return array(
        );
    }
}