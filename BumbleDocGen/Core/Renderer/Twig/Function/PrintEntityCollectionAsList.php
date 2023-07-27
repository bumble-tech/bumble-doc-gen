<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer\Twig\Function;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollection;

/**
 * Outputting entity data as HTML list
 *
 * @example  {{ printEntityCollectionAsList(phpClassEntityCollection.filterByInterfaces(['ScriptFramework\\ScriptInterface', 'ScriptFramework\\TestScriptInterface'])) }}
 *  The function will output a list of PHP classes that match the ScriptFramework\ScriptInterface and ScriptFramework\TestScriptInterface interfaces
 *
 * @example  {{ printEntityCollectionAsList(phpClassEntityCollection) }}
 *  The function will list all documented PHP classes
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
     * @param string $type List tag type (<ul>/<ol>)
     * @param bool $skipDescription Don't print description of this entities
     * @param bool $useFullName Use the full name of the entity in the list
     * @return string
     * @throws InvalidConfigurationParameterException
     */
    public function __invoke(
        RootEntityCollection $rootEntityCollection,
        string               $type = 'ul',
        bool                 $skipDescription = false,
        bool                 $useFullName = false,
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
            $name = $useFullName ? $entity->getName() : $entity->getShortName();
            $result .= "<li><a href='{$entityDocUrl}'>{$name}</a>{$descriptionText}</li>";
        }
        $result .= "</{$type}>";
        return "<embed> {$result} </embed>";
    }
}
