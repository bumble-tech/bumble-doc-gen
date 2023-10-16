<?php

declare(strict_types=1);

namespace Test\Unit\Core\Configuration\ValueTransformer;

use BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache;
use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\ConfigurationParameterBag;
use BumbleDocGen\Core\Configuration\ValueTransformer\ValueToClassTransformer;
use BumbleDocGen\DocGeneratorFactory;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntityCollection;
use BumbleDocGen\LanguageHandler\Php\PhpHandler;
use BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings;
use DI\Container;
use Exception;
use PHPUnit\Framework\TestCase;
use Psr\Log\NullLogger;

final class ValueToClassTransformerTest extends TestCase
{
    protected ValueToClassTransformer $valueToClassTransformer;

    public function setUp(): void
    {
        $this->valueToClassTransformer = new ValueToClassTransformer(new Container());
    }

    public function testCanTransform(): void
    {
        $this->assertFalse($this->valueToClassTransformer->canTransform(''));

        $this->assertFalse($this->valueToClassTransformer->canTransform([]));

        $this->assertFalse($this->valueToClassTransformer->canTransform([
            'class' => 'ClassThatDoesntExists'
        ]));

        $this->assertTrue($this->valueToClassTransformer->canTransform([
            'class' => ValueToClassTransformer::class
        ]));
    }

    public function testTransform(): void
    {
        $value = [
            'class' => Exception::class,
        ];

        $class = $this->valueToClassTransformer->transform($value);
        $this->assertInstanceOf(Exception::class, $class);

        $value = [
            'class' => DocGeneratorFactory::class,
        ];

        $class = $this->valueToClassTransformer->transform($value);
        $this->assertInstanceOf(DocGeneratorFactory::class, $class);

        $value = [
            'class' => Configuration::class,
            'arguments' => [
                [
                    'class' => ConfigurationParameterBag::class,
                    'arguments' => [
                        ['class' => ValueToClassTransformer::class],
                        []
                    ]
                ],
                [
                    'class' => LocalObjectCache::class
                ],
                [
                    'class' => NullLogger::class
                ]
            ]
        ];

        $class = $this->valueToClassTransformer->transform($value);
        $this->assertInstanceOf(Configuration::class, $class);


        $this->assertNull($this->valueToClassTransformer->transform(''));

        $this->assertNull($this->valueToClassTransformer->transform([
            'class' => 'ClassThatDoesntExists'
        ]));
    }
}
