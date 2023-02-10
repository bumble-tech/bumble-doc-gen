<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Twig\Function;

use BumbleDocGen\Parser\ParserHelper;
use BumbleDocGen\Render\Context\Context;
use BumbleDocGen\Render\Context\DocumentedEntityWrapper;
use BumbleDocGen\Render\Context\DocumentedEntityWrappersCollection;

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
 * @example {{ getDocumentedClassUrl('\\BumbleDocGen\\Render\\Twig\\MainExtension', '', false) }}
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
     * @param bool $createDocument
     *  If true, creates a class document. Otherwise, just gives a reference to the class code
     *
     * @return string
     */
    public function __invoke(string $className, string $cursor = '', bool $createDocument = true): string
    {
        $classEntityCollection = $this->context->getClassEntityCollection();
        $classEntity = $classEntityCollection->getLoadedOrCreateNew($className);
        if ($classEntity->classDataCanBeLoaded()) {
            if (!$classEntity->isInGit()) {
                return self::DEFAULT_URL;
            }
            if ($createDocument) {
                $documentedClass = new DocumentedEntityWrapper(
                    $classEntity, $this->context->getCurrentTemplateFilePatch()
                );
                $this->context->getEntityWrappersCollection()->add($documentedClass);
                $classEntityCollection->add($classEntity);
                $url = $this->context->getConfiguration()->getOutputDirBaseUrl() . $documentedClass->getDocUrl();
            } else {
                $url = $classEntity->getFileSourceLink(false);
            }

            if (mb_strlen($cursor) > 2) {
                $firstLetter = mb_substr($cursor, 0, 1);
                $cursor = ltrim($cursor, $firstLetter);
                if ($createDocument) {
                    $line = match ($firstLetter) {
                        'm' => $classEntity->getMethodEntityCollection()->get($cursor)?->getStartLine(),
                        'p' => $classEntity->getPropertyEntityCollection()->get($cursor)?->getStartLine(),
                        'q' => $classEntity->getConstantEntityCollection()->get($cursor)?->getStartLine(),
                        default => 0,
                    };
                } else {
                    $line = match ($firstLetter) {
                        'm' => $classEntity->getMethodEntityCollection()->unsafeGet($cursor)?->getStartLine(),
                        'p' => $classEntity->getPropertyEntityCollection()->unsafeGet($cursor)?->getStartLine(),
                        'q' => $classEntity->getConstantEntityCollection()->unsafeGet($cursor)?->getStartLine(),
                        default => 0,
                    };
                }
                $url .= $line ? "#L{$line}" : '';
            }

            return $url;
        } elseif (ParserHelper::isCorrectClassName($className)) {
            $this->context->getConfiguration()->getLogger()->warning(
                "GetDocumentedClassUrl: Class {$className} not found in specified sources"
            );
        }
        return self::DEFAULT_URL;
    }
}
