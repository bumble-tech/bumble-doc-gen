<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer\Twig\Function;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\RootEntityInterface;
use DI\DependencyException;
use DI\NotFoundException;

/**
 * Creates an entity link by object
 *
 * @note This function initiates the creation of documents for the displayed entities
 *
 * @example {{ drawDocumentedEntityLink($entity, 'getFunctions()') }}
 * @example {{ drawDocumentedEntityLink($entity) }}
 * @example {{ drawDocumentedEntityLink($entity, '', false) }}
 */
final class DrawDocumentedEntityLink implements CustomFunctionInterface
{
    public function __construct(private readonly GetDocumentedEntityUrl $getDocumentedEntityUrlFunction)
    {
    }

    public static function getName(): string
    {
        return 'drawDocumentedEntityLink';
    }

    public static function getOptions(): array
    {
        return [
            'is_safe' => ['html'],
        ];
    }

    /**
     * @param RootEntityInterface $entity The entity for which we want to get the link
     * @param string $cursor Reference to an element inside an entity, for example, the name of a function/constant/property
     * @param bool $useShortName Use the full or short entity name in the link
     *
     * @return string Entity document HTML link
     *
     * @throws NotFoundException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    public function __invoke(
        RootEntityInterface $entity,
        string $cursor = '',
        bool $useShortName = true
    ): string {
        $getDocumentedEntityUrlFunction = $this->getDocumentedEntityUrlFunction;
        $url = $getDocumentedEntityUrlFunction($entity->getRootEntityCollection(), $entity->getName(), $cursor);
        $name = $useShortName ? $entity->getShortName() : $entity->getName();
        return "[{$name}]({$url})";
    }
}
