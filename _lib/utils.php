<?php
function basicResponse(string $message, bool $success = false): array {
    return array(
        "success" => $success,
        "message" => $message
    );
}