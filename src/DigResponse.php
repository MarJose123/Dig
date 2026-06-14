<?php

namespace Marjose123\Dig;

use Illuminate\Support\Collection;

class DigResponse
{
    public function __construct(
        protected string $rawOutput,
        protected string $errorOutput,
        protected ?int $exitCode
    ) {}

    /**
     * Check if the DIG command executed successfully.
     */
    public function isSuccessful(): bool
    {
        return $this->exitCode === 0;
    }

    /**
     * Get the raw output string from the command.
     */
    public function raw(): string
    {
        return $this->rawOutput;
    }

    /**
     * Get the error output string from the command.
     */
    public function error(): string
    {
        return $this->errorOutput;
    }

    /**
     * Get the parsed, structured records as a Laravel Collection.
     */
    public function records(): Collection
    {
        $results = collect();

        if (! $this->isSuccessful() || empty(trim($this->rawOutput))) {
            return $results;
        }

        $lines = explode("\n", trim($this->rawOutput));

        foreach ($lines as $line) {
            $parts = preg_split('/\s+/', trim($line));

            // Ensure the line has the expected DNS parts: Host, TTL, Class, Type, Value
            if (count($parts) >= 5) {
                $results->push([
                    'host' => $parts[0],
                    'ttl' => (int) $parts[1],
                    'class' => $parts[2],
                    'type' => $parts[3],
                    // Merge any remaining parts in case the value has spaces (like TXT records)
                    'value' => implode(' ', array_slice($parts, 4)),
                ]);
            }
        }

        return $results;
    }
}
