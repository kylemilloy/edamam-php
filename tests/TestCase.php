<?php

namespace Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function canAuthenticateWithApi($id, $key)
    {
        return getenv($id) && getenv($key);
    }
}
