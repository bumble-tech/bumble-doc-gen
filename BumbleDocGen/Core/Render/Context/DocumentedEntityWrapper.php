<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Render\Context;

use BumbleDocGen\Core\Cache\LocalCache\Exception\InvalidCallContextException;
use BumbleDocGen\Core\Cache\LocalCache\Exception\ObjectNotFoundException;
use BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache;
use BumbleDocGen\Core\Render\EntityDocRender\EntityDocRenderInterface;

/**
 * Wrapper for the entity that was requested for documentation
 */
final class DocumentedEntityWrapper
{
    /**
     * @param DocumentTransformableEntityInterface $documentTransformableEntity An entity that is allowed to be documented
     * @param string $initiatorFilePath The file in which the documentation of the entity was requested
     */
    public function __construct(
        private DocumentTransformableEntityInterface $documentTransformableEntity,
        private LocalObjectCache                     $localObjectCache,
        private string                               $initiatorFilePath
    )
    {
    }

    public function getDocRender(): EntityDocRenderInterface
    {
        return $this->documentTransformableEntity->getDocRender();
    }

    /**
     * Get document key
     */
    public function getKey(): string
    {
        return md5("{$this->documentTransformableEntity->getName()}{$this->initiatorFilePath}");
    }

    private function getUniqueFileName(): string
    {
        $fileKey = $this->getKey();
        try {
            $usedKeysCounter = $this->localObjectCache->getMethodCachedResult(__METHOD__, '');
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, $fileKey);
        } catch (ObjectNotFoundException|InvalidCallContextException) {
        }
        $usedKeysCounter ??= [];
        $fileName = $this->documentTransformableEntity->getShortName();
        $counterKey = "{$this->initiatorFilePath}{$fileName}";

        if (!isset($usedKeysCounter[$counterKey])) {
            $usedKeysCounter[$counterKey] = 1;
        } else {
            $usedKeysCounter[$counterKey] += 1;
            $fileName .= '_' . $usedKeysCounter[$counterKey];
        }
        $this->localObjectCache->cacheMethodResult(__METHOD__, '', $usedKeysCounter);
        $this->localObjectCache->cacheMethodResult(__METHOD__, $fileKey, $fileName);
        return $fileName;
    }

    /**
     * The name of the file to be generated
     */
    public function getFileName(): string
    {
        return "{$this->getUniqueFileName()}.{$this->getDocRender()->getDocFileExtension()}";
    }

    /**
     * Get entity that is allowed to be documented
     */
    public function getDocumentTransformableEntity(): DocumentTransformableEntityInterface
    {
        return $this->documentTransformableEntity;
    }

    /**
     * Get the relative path to the document to be generated
     */
    public function getDocUrl(): string
    {
        $pathParts = explode('/', $this->initiatorFilePath);
        array_pop($pathParts);
        $path = implode('/', $pathParts);
        return "{$path}/{$this->getDocRender()->getDocFileNamespace()}/{$this->getFileName()}";
    }

    public function getInitiatorFilePath(): string
    {
        return $this->initiatorFilePath;
    }
}
