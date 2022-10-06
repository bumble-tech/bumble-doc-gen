<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Twig\Filter;

use BumbleDocGen\Parser\ParserHelper;
use BumbleDocGen\Render\Context\Context;
use BumbleDocGen\Render\Twig\Function\GetDocumentedClassUrl;

final class StrTypeToUrl
{
    public function __construct(private Context $context)
    {
    }

    public function __invoke(string $text, string $templateType = 'rst', bool $useShortLinkVersion = false): string
    {
        $getDocumentedClassUrlFunction = new GetDocumentedClassUrl($this->context);

        $preparedTypes = [];
        $reflector = $this->context->getReflector();
        $configuration = $this->context->getConfiguration();
        $types = explode('|', $text);
        foreach ($types as $type) {
            if (ParserHelper::isClassLoaded($reflector, $type)) {
                $reflectionOfLink = $reflector->reflectClass($type);
                $fullFileName = $reflectionOfLink->getFileName();
                if ($fullFileName && str_starts_with($fullFileName, $configuration->getProjectRoot())) {
                    $classEntity = $this->context->getClassEntityCollection()->getEntityByClassName(
                        $reflectionOfLink->getName()
                    );
                    if ($classEntity) {
                        $link = $getDocumentedClassUrlFunction($classEntity->getName());
                    } else {
                        $fileName = str_replace(
                            $configuration->getProjectRoot(),
                            '',
                            $fullFileName
                        );
                        $link = "{$fileName}#L{$reflectionOfLink->getStartLine()}";
                    }

                    if ($useShortLinkVersion) {
                        $type = $reflectionOfLink->getShortName();
                    } else {
                        $type = $reflectionOfLink->getName();
                    }

                    if ($templateType == 'rst') {
                        $preparedTypes[] = "`{$type} <{$link}>`_";
                    } else {
                        $preparedTypes[] = "<a href='{$link}'>{$type}</a>";
                    }
                }
            } else {
                $preparedTypes[] = $type;
            }
        }

        return implode(' | ', $preparedTypes);
    }
}
