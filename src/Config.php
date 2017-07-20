<?php
declare(strict_types=1);

namespace SshConfig;

use SshConfig\Parser;

class Config
{

    private function __construct()
    {
    }

    public static function parse(string $input): ?array
    {
        $parser = new Parser($input);
        return $parser->run();
    }

    public static function parse_config_file(string $filepath): ?array
    {
        $content = file_get_contents($filepath);
        return Config::parse($content);
    }
}
