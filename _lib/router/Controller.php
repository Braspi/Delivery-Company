<?php

namespace _lib\router;

interface Controller {
    function routes(Router $router): void;
}