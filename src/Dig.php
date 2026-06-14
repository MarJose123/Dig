<?php

namespace Marjose123\Dig;

use Symfony\Component\Process\Process;

class Dig
{
    protected string $domain;

    protected string $type = 'A';

    protected ?string $server = null;

    /**
     * Named constructor for maximum fluency.
     */
    public static function domain(string $domain): self
    {
        return new static($domain);
    }

    public function __construct(string $domain)
    {
        $this->domain = $domain;
    }

    /**
     * Set the DNS record type (A, MX, TXT, etc.)
     */
    public function type(string $type): self
    {
        $this->type = strtoupper($type);

        return $this;
    }

    /**
     * Specify a nameserver to query (e.g., 8.8.8.8)
     */
    public function server(string $server): self
    {
        $this->server = $server;

        return $this;
    }

    /**
     * Execute the DIG command and return a structured response.
     */
    public function run(): DigResponse
    {
        $command = [
            'dig',
            '+nocmd',
            '+nocomments',
            '+noquestion',
            '+noall',
            '+answer',
            $this->domain,
            $this->type,
        ];

        if ($this->server) {
            // Append the server if specified
            $command[] = '@'.$this->server;
        }

        $process = new Process($command);
        $process->run();

        return new DigResponse(
            $process->getOutput(),
            $process->getErrorOutput(),
            $process->getExitCode()
        );
    }
}
