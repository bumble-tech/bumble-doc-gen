<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity\Ast;

use PhpParser\Lexer\Emulative;
use PhpParser\Parser;
use PhpParser\ParserFactory;

final class PhpParserHelper
{
    private ?Parser $phpParser = null;

    public function phpParser(): Parser
    {
        if (!$this->phpParser) {
            $this->phpParser = (new ParserFactory())->create(ParserFactory::ONLY_PHP7, new Emulative([
                'usedAttributes' => ['comments', 'startLine', 'endLine', 'startFilePos', 'endFilePos'],
            ]));
        }
        return $this->phpParser;
    }
}
