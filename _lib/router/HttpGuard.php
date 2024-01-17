<?php

namespace _lib\router;

interface HttpGuard {
    function canActivate(RouterCall $call): bool;
}