<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer\Context\Dependency;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Renderer\RendererHelper;
use Symfony\Component\Finder\Finder;

final class DirectoryDependency implements RendererDependencyInterface
{
    public function __construct(
        private string $dirInternalLink,
        private string $hash,
    )
    {
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public static function create(
        RendererHelper $rendererHelper,
        string         $dirPath,
    ): DirectoryDependency
    {
        $dirInternalLink = $rendererHelper->filePathToFileInternalLink($dirPath);
        return new self($dirInternalLink, self::getDirHash($rendererHelper, $dirPath));
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    private static function getDirHash(RendererHelper $rendererHelper, string $dirPath): string
    {
        $finder = Finder::create()
            ->ignoreVCS(true)
            ->ignoreDotFiles(true)
            ->ignoreUnreadableDirs()
            ->sortByName()
            ->in($dirPath);

        $dirFiles = [];
        foreach ($finder->files() as $obj) {
            $objName = $rendererHelper->filePathToFileInternalLink($obj->getPathname());
            $dirFiles[$objName] = $objName;
        }
        sort($dirFiles);
        return md5(join('', $dirFiles));
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function isChanged(RendererHelper $rendererHelper): bool
    {
        $dirName = $rendererHelper->fileInternalLinkToFilePath($this->dirInternalLink);
        $newHash = self::getDirHash($rendererHelper, $dirName);
        if ($newHash !== $this->hash) {
            return true;
        }
        return false;
    }
}
