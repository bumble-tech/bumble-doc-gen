<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Context;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\Parser\Entity\ClassEntity;
use BumbleDocGen\Render\Breadcrumbs\BreadcrumbsHelper;

final class DocumentedClass
{
    private BreadcrumbsHelper $breadcrumbsHelper;

    public function __construct(
        private ConfigurationInterface $configuration,
        private ClassEntity $classEntity,
        private string $initiatorFilePath
    ) {
        $this->breadcrumbsHelper = new BreadcrumbsHelper($this->configuration);
    }

    public function getKey(): string
    {
        return substr(
            base_convert(
                md5(serialize($this->getBreadcrumbsData()) . $this->classEntity->getName()),
                16,
                32
            ),
            0,
            12
        );
    }

    public function getFileName(): string
    {
        $className = str_replace('\\', '_', $this->classEntity->getShortName());
        return "{$className}_{$this->getKey()}.rst";
    }

    public function getClassEntity(): ClassEntity
    {
        return $this->classEntity;
    }

    public function getBreadcrumbsData(): array
    {
        return $this->breadcrumbsHelper->getBreadcrumbs($this->initiatorFilePath);
    }

    public function getDocUrl(): string
    {
        $pathParts = explode('/', $this->initiatorFilePath);
        array_pop($pathParts);
        $path = implode('/', $pathParts);
        return "{$path}/_Classes/{$this->getFileName()}";
    }
}
