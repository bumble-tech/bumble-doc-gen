<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer\Twig\Function;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
use BumbleDocGen\Core\Renderer\Twig\Filter\RemoveLineBrakes;

/**
 * Outputting entity data as MD list
 *
 * @note This function initiates the creation of documents for the displayed entities
 *
 * @example  {{ printEntityCollectionAsList(phpEntities.filterByInterfaces(['ScriptFramework\\ScriptInterface', 'ScriptFramework\\TestScriptInterface'])) }}
 *  The function will output a list of PHP classes that match the ScriptFramework\ScriptInterface and ScriptFramework\TestScriptInterface interfaces
 *
 * @example  {{ printEntityCollectionAsList(phpEntities) }}
 *  The function will list all documented PHP classes
 */
final class PrintEntityCollectionAsList implements CustomFunctionInterface
{
    public function __construct(
        private readonly GetDocumentedEntityUrl $getDocumentedEntityUrlFunction,
        private readonly RemoveLineBrakes $removeLineBrakes
    ) {
    }

    public static function getName(): string
    {
        return 'printEntityCollectionAsList';
    }

    public static function getOptions(): array
    {
        return [
            'is_safe' => ['html'],
            'needs_context' => true,
        ];
    }

    /**
     * @param array $context
     * @param RootEntityCollection $rootEntityCollection Processed entity collection
     * @param string $type List tag type (<ul>/<ol>)
     * @param bool $skipDescription Don't print description of this entities
     * @param bool $useFullName Use the full name of the entity in the list
     * @return string
     */
    public function __invoke(
        array $context,
        RootEntityCollection $rootEntityCollection,
        string $type = 'ul',
        bool $skipDescription = false,
        bool $useFullName = false,
    ): string {
        $result = '';
        $prefix = '1. ';
        if ($type === 'ul') {
            $prefix = '- ';
        }
        foreach ($rootEntityCollection as $entity) {
            $description = $entity->getDescription();
            $descriptionText = call_user_func($this->removeLineBrakes, !$skipDescription && $description ? " - {$description}" : '');
            $entityDocUrl = call_user_func_array($this->getDocumentedEntityUrlFunction, [
                $context,
                $rootEntityCollection,
                $entity->getName()
            ]);
            $name = $useFullName ? $entity->getName() : $entity->getShortName();
            $result .= "{$prefix} [{$name}]({$entityDocUrl}){$descriptionText}\n";
        }
        return $result;
    }
}
