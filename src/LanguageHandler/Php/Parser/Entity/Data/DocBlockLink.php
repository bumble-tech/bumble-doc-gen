<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity\Data;

final class DocBlockLink
{
    public function __construct(
        public string $name,
        public string $description = '',
        public ?string $className = null,
        public ?string $url = null,
    ) {
    }
}
