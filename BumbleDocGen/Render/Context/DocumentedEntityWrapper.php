<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Context;

/**
 * Wrapper for the class that was requested for documentation
 */
final class DocumentedEntityWrapper
{
    /**
     * @param DocumentTransformableEntityInterface $documentTransformableEntity An entity that is allowed to be documented
     * @param string $initiatorFilePath The file in which the documentation of the entity was requested
     */
    public function __construct(
        private DocumentTransformableEntityInterface $documentTransformableEntity,
        private string $initiatorFilePath
    ) {
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
        static $fileNames = [];
        static $usedKeysCounter = [];

        $fileKey = $this->getKey();
        if (!isset($fileNames[$fileKey])) {
            $fileName = $this->documentTransformableEntity->getShortName();
            $counterKey = "{$this->initiatorFilePath}{$fileName}";

            if (!isset($usedKeysCounter[$counterKey])) {
                $usedKeysCounter[$counterKey] = 1;
            } else {
                $usedKeysCounter[$counterKey] += 1;
                $fileName .= '_' . $usedKeysCounter[$counterKey];
            }
            $fileNames[$fileKey] = $fileName;
        }
        return $fileNames[$fileKey];
    }

    /**
     * The name of the file to be generated
     */
    public function getFileName(string $fileExtension = 'rst'): string
    {
        return "{$this->getUniqueFileName()}.{$fileExtension}";
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
        return "{$path}/_Classes/{$this->getFileName()}";
    }

    public function getInitiatorFilePath(): string
    {
        return $this->initiatorFilePath;
    }
}
