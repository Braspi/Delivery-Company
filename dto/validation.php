<?php
class Validation {
    private array $violations = array();

    public function __construct(Validated $dto){
        foreach ($dto->validate() as $key => $violations) {
            foreach ($violations as $violation) {
                if (!$violation->check($dto->getData()[$key])) {
                    if (!isset($this->violations[$key]))
                        $this->violations[$key] = $violation->getMessage();
                }
            }
        }
    }
    function execute($res){
        if (count($this->violations) == 0) return;
        $res->status(400);
        $res->json(array(
            "success" => false,
            "errors" => $this->violations
        ));
        $res->end();
    }
}