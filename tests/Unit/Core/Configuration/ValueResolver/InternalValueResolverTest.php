<?php

namespace Test\Unit\Core\Configuration\ValueResolver;

use BumbleDocGen\Core\Configuration\ConfigurationParameterBag;
use BumbleDocGen\Core\Configuration\ValueResolver\InternalValueResolver;
use BumbleDocGen\DocGeneratorFactory;
use PHPUnit\Framework\TestCase;

class InternalValueResolverTest extends TestCase
{
    protected InternalValueResolver $internalValueResolver;
    protected ConfigurationParameterBag $configurationParameterBag;

    public static function setUpBeforeClass(): void
    {
        \DG\BypassFinals::enable();
    }

    public function setUp(): void
    {
        $this->internalValueResolver = new InternalValueResolver([
            'WORKING_DIR'   => '/home/john/foo',
            'bin'           => '/bin/phpunit'
        ]);
        $this->configurationParameterBag = $this->createMock(ConfigurationParameterBag::class);
    }

    /**
     * @dataProvider dataProviderCollection
     */
    public function testArgvValueResolver($value, $expected): void
    {
        $resolvedValue = $this->internalValueResolver->resolveValue(
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
                '$value' => '%WORKING_DIR%/docs',
                '$expected' => '/home/john/foo/docs',
            ],
            'testSingleValueWithoutPlaceholder' => [
                '$value' => 'docs',
                '$expected' => 'docs',
            ],
            'testArrayWithPlaceholder' => [
                '$value' => [
                    'project_root' => '%WORKING_DIR%/test',
                    'output_dir' => '%bin%/docs',
                ],
                '$expected' => [
                    'project_root' => '/home/john/foo/test',
                    'output_dir' => '/bin/phpunit/docs',
                ],
            ],
            'testDefaultValue' => [
                '$value' => false,
                '$expected' => false,
            ],
        ];
    }
}
