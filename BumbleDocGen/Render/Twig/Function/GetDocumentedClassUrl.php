<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Twig\Function;

use BumbleDocGen\Parser\ParserHelper;
use BumbleDocGen\Render\Context\Context;
use BumbleDocGen\Render\Context\DocumentedEntityWrapper;
use BumbleDocGen\Render\Context\DocumentedEntityWrappersCollection;
use BumbleDocGen\Render\Twig\Filter\PrepareSourceLink;

/**
 * Get the URL of a documented class by its name. If the class is found, next to the file where this method was called,
 * the `_Classes` directory will be created, in which the documented class file will be created
 *
 * @note This function initiates the creation of documents for the displayed classes
 * @see DocumentedEntityWrapper
 * @see DocumentedEntityWrappersCollection
 * @see Context::$entityWrappersCollection
 *
 * @example {{ getDocumentedClassUrl('\\BumbleDocGen\\Render\\Twig\\MainExtension', 'getFunctions') }}
 * @example {{ getDocumentedClassUrl('\\BumbleDocGen\\Render\\Twig\\MainExtension') }}
 */
final class GetDocumentedClassUrl
{
    public const DEFAULT_URL = '#';

    /**
     * @param Context $context Render context
     */
    public function __construct(private Context $context)
    {
    }

    /**
     * @param string $className
     *  The full name of the class for which the URL will be retrieved.
     *  If the class is not found, the DEFAULT_URL value will be returned.
     * @param string $cursor
     *  Cursor on the page of the documented class (for example, the name of a method or property)
     *
     * @return string
     */
    public function __invoke(string $className, string $cursor = ''): string
    {
        if (str_starts_with($className, '\\')) {
            $className = ltrim($className, '\\');
        }
        $reflector = $this->context->getReflector();
        if (ParserHelper::isClassLoaded($reflector, $className)) {
            $classEntityCollection = $this->context->getClassEntityCollection();
            $entityWrappersCollection = $this->context->getEntityWrappersCollection();
            $classEntity = $classEntityCollection->get($className);
            if (!is_null($classEntity)) {
                $documentedClass = new DocumentedEntityWrapper(
                    $classEntity, $this->context->getCurrentTemplateFilePatch()
                );
                $entityWrappersCollection->add($documentedClass);
                $url = $this->context->getConfiguration()->getOutputDirBaseUrl() . $documentedClass->getDocUrl();
            } else {
                $configuration = $this->context->getConfiguration();
                $reflection = $reflector->reflectClass($className);
                $url = $reflection->getFileName() ? str_replace(
                    $configuration->getProjectRoot(),
                    '',
                    $reflection->getFileName()
                ) : '';
            }

            if ($url && $cursor) {
                $prepareSourceLink = new PrepareSourceLink();
                return "{$url}#{$prepareSourceLink($cursor)}";
            }
            return $url;
        }
        return self::DEFAULT_URL;
    }
}
