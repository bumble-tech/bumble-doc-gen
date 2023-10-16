<?php

namespace Test\Unit\Core\Configuration\ValueResolver;

use BumbleDocGen\Core\Configuration\ConfigurationParameterBag;
use BumbleDocGen\Core\Configuration\ValueResolver\ArgvValueResolver;
use BumbleDocGen\DocGeneratorFactory;
use PHPUnit\Framework\TestCase;

class ArgvValueResolverTest extends TestCase
{
    protected ArgvValueResolver $argvValueResolver;
    protected ConfigurationParameterBag $configurationParameterBag;

    public static function setUpBeforeClass(): void
    {
        \DG\BypassFinals::enable();
    }

    public function setUp(): void
    {
        $_SERVER['argv'] += [
            8 => '/home/john/foo',
            9 => '/bin/phpunit'
        ];
        $this->argvValueResolver = new ArgvValueResolver();
        $this->configurationParameterBag = $this->createMock(ConfigurationParameterBag::class);
    }

    /**
     * @dataProvider dataProviderCollection
     */
    public function testArgvValueResolver($value, $expected): void
    {
        $resolvedValue = $this->argvValueResolver->resolveValue(
            $this->configurationParameterBag,
            $value
        );

        if (is_array($value) && is_array($expected)) {
            foreach ($expected as $key => $val) {
                $this->assertEquals($val, $resolvedValue[$key]);
            }

            return;
        }

        $this->assertEquals($expected, $resolvedValue);
    }

    public function dataProviderCollection(): array
    {
        return [
            'testSingleValue' => [
                '$value' => '%argv:8%/docs',
                '$expected' => '/home/john/foo/docs',
            ],
            'testArrayWithPlaceholder' => [
                '$value' => [
                    'project_root' => '%argv:8%/test',
                    'output_dir' => '%argv:9%/docs',
                ],
                '$expected' => [
                    'project_root' => '/home/john/foo/test',
                    'output_dir' => '/bin/phpunit/docs',
                ],
            ],
            'testSingleValueWithoutPlaceholder' => [
                '$value' => 'docs',
                '$expected' => 'docs',
            ],
            'testDefaultValue' => [
                '$value' => false,
                '$expected' => false,
            ],
        ];
    }
}
