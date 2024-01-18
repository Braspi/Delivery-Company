<?php
function component(string $name, array $params = array()): void {
    extract($params);
    include root_path."/components/$name.component.php";
}

function _t(string $value): void {
    echo $value;
}
function _o(mixed $value): void {
    print_r($value);
}