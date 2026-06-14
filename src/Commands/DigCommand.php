<?php

namespace Marjose123\Dig\Commands;

use Illuminate\Console\Command;

class DigCommand extends Command
{
    public $signature = 'dig';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
