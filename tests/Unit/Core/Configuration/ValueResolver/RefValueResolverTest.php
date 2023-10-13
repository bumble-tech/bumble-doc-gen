<?php

namespace Test\Unit\Core\Configuration\ValueResolver;

use BumbleDocGen\Core\Configuration\ConfigurationParameterBag;
use BumbleDocGen\Core\Configuration\ValueResolver\RefValueResolver;
use BumbleDocGen\DocGeneratorFactory;
use DI\Container;
use PHPUnit\Framework\TestCase;

class RefValueResolverTest extends TestCase
{
    protected RefValueResolver $refValueResolver;
    protected ConfigurationParameterBag $configurationParameterBag;

    public static function setUpBeforeClass(): void
    {
        \DG\BypassFinals::enable();
    }

    public function setUp(): void
    {
        $this->refValueResolver = new RefValueResolver();
        $this->configurationParameterBag = $this->createMock(ConfigurationParameterBag::class);
        $this->configurationParameterBag->expects($this->any())->method('get')->willReturn('test');
    }

    /**
     * @dataProvider dataProviderCollection
     */
    public function testRefValueResolver($value, $expected): void
    {
        $resolvedValue = $this->refValueResolver->resolveValue(
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
                '$value' => '%project_root%/docs',
                '$expected' => 'test/docs',
            ],
            'testArrayWithPlaceholder' => [
                '$value' => [
                    'project_root' => 'test',
                    'output_dir' => '%project_root%/docs',
                ],
                '$expected' => [
                    'project_root' => 'test',
                    'output_dir' => 'test/docs',
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
