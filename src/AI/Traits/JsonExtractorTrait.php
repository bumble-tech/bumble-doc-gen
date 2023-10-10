<?php

declare(strict_types=1);

namespace BumbleDocGen\AI\Traits;

trait JsonExtractorTrait
{
    private function extractFirstJsonObjectFromText($text)
    {
        $pattern = '/\{(?:[^{}]|(?R))*}/x';
        $result = preg_match_all($pattern, $text, $matches);

        if ($result === false || !isset($matches[0][0])) {
            throw new RuntimeException('Failed to extract JSON object');
        }

        // Check if the matched string is valid JSON
        $jsonObject = $matches[0][0];
        try {
            json_decode($jsonObject, false, 512, JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
            throw new RuntimeException('Failed to decode JSON object: ' . $e->getMessage());
        }

        return $jsonObject;
    }
}
