<?php

declare(strict_types=1);

namespace Test\Unit\Core\Parser;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup;
use BumbleDocGen\Core\Parser\ProjectParser;
use BumbleDocGen\LanguageHandler\LanguageHandlerInterface;
use BumbleDocGen\LanguageHandler\LanguageHandlersCollection;
use PHPUnit\Framework\TestCase;

final class ProjectParserTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        \DG\BypassFinals::enable();
    }

    /**
     * @dataProvider providerParse
     */
    public function testParse(int $languageHandlerCount): void
    {
        $configurationStub = $this->createStub(Configuration::class);

        $languageHandlersCollection = LanguageHandlersCollection::create();
        $handlersToAddCount = $languageHandlerCount;
        while ($handlersToAddCount--) {
            $languageHandlerMock = $this->createLanguageHandlerMock((string)$handlersToAddCount);
            $languageHandlersCollection->add($languageHandlerMock);
        }

        $configurationStub
            ->expects($this->once())
            ->method('getLanguageHandlersCollection')
            ->willReturn($languageHandlersCollection);

        $rootEntityCollectionsGroup = new RootEntityCollectionsGroup();

        $projectParser = new ProjectParser($configurationStub, $rootEntityCollectionsGroup);
        $projectParser->parse();

        self::assertCount($languageHandlerCount, $rootEntityCollectionsGroup);
    }

    public function providerParse(): array
    {
        return [
            "Without Language Handlers" => [
                '$handlersCount' => 0,
            ],
            "One Language Handler" => [
                '$handlersCount' => 1,
            ],
            "Several Language Handlers" => [
                '$handlersCount' => 10,
            ],
        ];
    }

    private function createLanguageHandlerMock(string $mockNamePostfix): LanguageHandlerInterface
    {
        $rootEntityCollectionStub = $this->createStub(RootEntityCollection::class);
        $rootEntityCollectionStub->expects($this->once())
            ->method('getEntityCollectionName')
            ->willReturn(uniqid());
        $languageHandlerMock = $this
            ->getMockBuilder(LanguageHandlerInterface::class)
            ->setMockClassName("LanguageHandlerInterface_Mock_{$mockNamePostfix}")
            ->onlyMethods([
                'getEntityCollection',
                'getLanguageKey',
                'getCustomTwigFunctions',
                'getCustomTwigFilters',
            ])
            ->getMock();
        $languageHandlerMock
            ->expects($this->once())
            ->method('getEntityCollection')
            ->willReturn($rootEntityCollectionStub);
        return $languageHandlerMock;
    }
}
