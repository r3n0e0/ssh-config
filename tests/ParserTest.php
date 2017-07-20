<?php
declare(strict_types=1);

use SshConfig\Parser;

class ParserTest extends TestCase
{
    private $configData;

    public function testValidRegexp(): void
    {
        $input = array(
            'Host world',
            'Ocean=yes',
        );
        $expected = array(
            array('Host world', 'Host', 'world'),
            array('Ocean=yes', 'Ocean', 'yes'),
        );

        Closure::bind(function() use($input, $expected) {
            $parser = new Parser('DUMMY');
            foreach (array_combine($input, $expected) as $in => $ex) {
                $this->assertSame(
                    $ex,
                    $parser->regexp_match($in)
                );
            }
        }, $this, Parser::class)->__invoke();
    }

    public function testInvalidRegexp(): void
    {
        $this->expectException(Exception::class);
        Closure::bind(function() {
            $parser = new Parser('DUMMY');
            $parser->regexp_match('MOUNTAIN');
        }, $this, Parser::class)->__invoke();
    }
}
