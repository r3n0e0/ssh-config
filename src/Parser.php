<?php
declare(strict_types=1);

namespace SshConfig;

class Parser
{
    private $input;
    private $parsed_result;

    const SECTION_PATTERN = '/(\w+)(?:\s*=\s*|\s+)(.+)/';

    public function __construct(string $input)
    {
        $this->input = $input;
        $this->parsed_result = array();
    }

    public function run(): ?array
    {
        $this->parse();
        return empty($this->parsed_result) ? null : $this->parsed_result;
    }

    private function parse()
    {
        $host = array();
        $lines = explode("\n", $this->input);
        foreach ($lines as $line) {
            if (empty($line)) continue;
            [$_, $key, $value] = $this->regexp_match($line);
            if ($key === 'Host') {
                if (!empty($host)) array_push($this->parsed_result, $host);
                $host = array('Host' => $value, 'Config' => array());
            } else {
                $host['Config'][$key] = $value;
            }
        }
        array_push($this->parsed_result, $host);
    }

    private function regexp_match(string $subject): array
    {
        if (preg_match(Parser::SECTION_PATTERN, trim($subject), $matches)) {
            return $matches;
        } else {
            throw new \Exception('Invalid input');
        }
    }
}
