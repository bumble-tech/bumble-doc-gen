<?php

declare(strict_types=1);

namespace SelfDocConfig\Twig\CustomFunction;

use BumbleDocGen\Console\App;
use BumbleDocGen\Core\Renderer\Twig\Function\CustomFunctionInterface;

final class GetConsoleCommands implements CustomFunctionInterface
{
    public static function getName(): string
    {
        return 'getConsoleCommands';
    }

    public function __invoke(): array
    {
        $result = [];

        $app = new App();
        $commands = $app->all();

        foreach ($commands as $command) {
            $synopsis = $command->getSynopsis();
            $synopsis = htmlspecialchars($synopsis);
            $commandParts = explode(' ', $synopsis);
            $name = array_shift($commandParts);
            if (str_starts_with($name, '_')) {
                continue;
            }
            $synopsis = str_replace('] [', "]<br>[", implode(' ', $commandParts));
            $synopsis = str_replace("<br>[--]<br>", "<br>", $synopsis);
            $result[] = [
                'name' => $name,
                'class' => get_class($command),
                'description' => $command->getDescription(),
                'synopsis' => $synopsis
            ];
        }

        return $result;
    }

    public static function getOptions(): array
    {
        return [
            'is_safe' => ['html'],
        ];
    }
}
