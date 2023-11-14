<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Logger\Handler;

use BumbleDocGen\Core\Renderer\Context\RendererContext;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;

final class GenerationErrorsHandler extends AbstractProcessingHandler
{
    private array $records = [];

    public function __construct(
        private RendererContext $rendererContext,
        $level = Logger::WARNING,
        bool $bubble = true
    ) {
        parent::__construct($level, $bubble);
    }

    protected function write(array $record): void
    {
        $initiator = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS)[3] ?? [];
        $fileName = str_replace([
            dirname(__DIR__, 4),
            getcwd()
        ], '', $initiator['file'] ?? '');
        $line = $initiator['line'] ?? '';

        $initiator = "{$fileName}#{$line}";
        $entityDocUrl = $this->rendererContext->getCurrentDocumentedEntityWrapper()?->getDocUrl();
        if ($entityDocUrl) {
            $initiator .= "\n{$entityDocUrl}";
        } elseif ($this->rendererContext->getCurrentTemplateFilePatch()) {
            $initiator .= "\n{$this->rendererContext->getCurrentTemplateFilePatch()}";
        }

        $this->records[] = [
            "type" => $record['level_name'],
            "msg" => $record['message'],
            'initiator' => $initiator,
            'isRenderingError' => boolval($this->rendererContext->getCurrentTemplateFilePatch()),
            'currentDocumentedEntityWrapper' => $this->rendererContext->getCurrentDocumentedEntityWrapper()?->getDocumentTransformableEntity()?->getName()
        ];
    }

    public function getRecords(): array
    {
        return $this->records;
    }

    public function addRecords(array $records): void
    {
        $this->records = array_merge($this->records, $records);
    }
}
