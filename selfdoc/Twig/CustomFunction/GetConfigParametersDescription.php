<?php

declare(strict_types=1);

namespace SelfDocConfig\Twig\CustomFunction;

use BumbleDocGen\Core\Configuration\ConfigurationParameterBag;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
use BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionInterface;
use Noodlehaus\Config;

use function BumbleDocGen\Core\is_associative_array;

final class GetConfigParametersDescription implements CustomFunctionInterface
{
    public function __construct(private ConfigurationParameterBag $parameterBag)
    {
    }

    public function __invoke(RootEntityCollection $rootEntityCollection, string $configName): array
    {
        $configName = $this->parameterBag->resolveValue($configName);
        $params = [];
        $conf = Config::load($configName);
        $configContent = file_get_contents($configName);
        foreach ($conf->all() as $name => $defaultValue) {
            preg_match("/({$name}:)([^#]+)(#)(( ?\([^\\)]+\\))?)(.*)/", $configContent, $matches);
            if (is_array($defaultValue)) {
                if (is_associative_array($defaultValue)) {
                    $shortName = array_reverse(explode('\\', $defaultValue['class']))[0];
                    $tmpDefaultValue = "[a x-title='{$shortName}']{$defaultValue['class']}[/a]";
                } else {
                    $tmpDefaultValue = "\n\n";
                    foreach ($defaultValue as $v) {
                        $shortName = array_reverse(explode('\\', $v['class']))[0];
                        $tmpDefaultValue .= "- [a x-title='{$shortName}']{$v['class']}[/a]\n\n";
                    }
                }
                $defaultValue = $tmpDefaultValue;
            } else {
                $defaultValue = var_export($defaultValue, true);
            }
            $params[] = [
                'key' => $name,
                'type' => str_replace([' ', '(', ')'], '', $matches[4] ?? ''),
                'description' => trim($matches[6] ?? ''),
                'defaultValue' => $defaultValue,
            ];
        }
        return $params;
    }

    public static function getName(): string
    {
        return 'getConfigParametersDescription';
    }

    public static function getOptions(): array
    {
        return [
            'is_safe' => ['html'],
        ];
    }
}
