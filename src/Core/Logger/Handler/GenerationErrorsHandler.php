<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Logger\Handler;

use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;

final class GenerationErrorsHandler extends AbstractProcessingHandler
{
    private array $records = [];

    public function __construct($level = Logger::WARNING, bool $bubble = true)
    {
        parent::__construct($level, $bubble);
    }

    protected function write(array $record): void
    {
        $this->records[] = [
            "type" => $record['level_name'],
            "msg" => $record['message']
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
