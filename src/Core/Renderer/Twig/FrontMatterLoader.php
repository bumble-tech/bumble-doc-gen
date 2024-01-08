<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer\Twig;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Renderer\Breadcrumbs\BreadcrumbsHelper;
use Twig\Error\LoaderError;
use Twig\Loader\LoaderInterface;
use Twig\Source;

final class FrontMatterLoader implements LoaderInterface
{
    public function __construct(
        private readonly LoaderInterface $loader,
        private readonly BreadcrumbsHelper $breadcrumbsHelper,
        private readonly bool $removeFrontMatterFromTemplate = true
    ) {
    }

    /**
     * @throws LoaderError
     * @throws InvalidConfigurationParameterException
     */
    public function getSourceContext(string $name): Source
    {
        $source = $this->loader->getSourceContext($name);
        $code = $source->getCode();
        $data = $this->breadcrumbsHelper->getTemplateFrontMatter($name);
        if ($data) {
            $vars = '';
            foreach ($data as $name => $val) {
                $val = (string)json_encode($val, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
                $vars .= "{% set {$name} = {$val} %}";
            }
            $code = preg_replace(
                '/^---([^-]+)(---)/',
                $this->removeFrontMatterFromTemplate ? $vars : "$0\n{$vars}",
                $code
            );
        }
        return new Source($code, $source->getName(), $source->getPath());
    }

    public function getCacheKey(string $name): string
    {
        return $this->loader->getCacheKey($name);
    }

    public function isFresh(string $name, int $time): bool
    {
        return $this->loader->isFresh($name, $time);
    }

    public function exists(string $name): bool
    {
        return $this->loader->exists($name);
    }
}
