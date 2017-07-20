<?php
declare(strict_types=1);

use SshConfig\Config;

class ConfigTest extends TestCase
{
    private $configData;

    protected function setUp()
    {
        $this->configData = $this->file_fixture('ssh.config');
    }

    public function testXYZ(): void
    {
        $config = Config::parse($this->configData);
        $this->assertNotNull($config);
        $this->assertTrue(is_array($config));
        $this->assertEquals(2, count($config));
        $this->assertEquals('hello', $config[0]['Host']);
    }
}
