<?php

namespace utils\router;

interface HttpGuard {
    function canActivate(RouterCall $call): bool;
}