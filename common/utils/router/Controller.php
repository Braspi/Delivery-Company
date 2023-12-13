<?php

namespace utils\router;

interface Controller {
    function routes(Router $router): void;
}