<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Render\Twig\Function;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollection;

/**
 * Outputting entity data as HTML or rst list
 */
final class PrintEntityCollectionAsList implements CustomFunctionInterface
{
    public function __construct(private GetDocumentedEntityUrl $getDocumentedEntityUrlFunction)
    {
    }

    public static function getName(): string
    {
        return 'printEntityCollectionAsList';
    }

    public static function getOptions(): array
    {
        return [
            'is_safe' => ['html'],
        ];
    }

    /**
     * @param RootEntityCollection $rootEntityCollection Processed entity collection
     * @param string $type List tag type
     * @param bool $skipDescription Don't print description
     * @return string
     * @throws InvalidConfigurationParameterException
     */
    public function __invoke(
        RootEntityCollection $rootEntityCollection,
        string               $type = 'ul',
        bool                 $skipDescription = false
    ): string
    {
        $result = "<{$type}>";
        foreach ($rootEntityCollection as $entity) {
            $description = $entity->getDescription();
            $descriptionText = !$skipDescription && $description ? " - {$description}" : '';
            $entityDocUrl = call_user_func_array($this->getDocumentedEntityUrlFunction, [
                $rootEntityCollection,
                $entity->getName()
            ]);
            $result .= "<li><a href='{$entityDocUrl}'>{$entity->getShortName()}</a>{$descriptionText}</li>";
        }
        $result .= "</{$type}>";
        return "<embed> {$result} </embed>";
    }
}
