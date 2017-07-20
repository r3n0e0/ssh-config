<?php
declare(strict_types=1);

abstract class TestCase extends PHPUnit\Framework\TestCase
{
    protected function file_fixture(string $filename) : string
    {
        return file_get_contents(__DIR__ . '/fixtures/' . $filename);
    }
}
