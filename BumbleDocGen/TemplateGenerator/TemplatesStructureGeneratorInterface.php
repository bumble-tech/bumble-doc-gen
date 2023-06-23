<?php

declare(strict_types=1);

namespace BumbleDocGen\TemplateGenerator;

use BumbleDocGen\Core\Parser\Entity\RootEntityCollection;

interface TemplatesStructureGeneratorInterface
{
    public function generateStructureByEntityCollection(
        RootEntityCollection $rootEntityCollection,
        ?string              $additionalPrompt = null,
    ): array;
}
