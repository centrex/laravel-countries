<?php

declare(strict_types=1);

namespace Centrex\LaravelCountries\Commands;

use Illuminate\Console\Command;

class CountriesCommand extends Command
{
    public $signature = 'countries';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
