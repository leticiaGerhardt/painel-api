<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

/**
 * Class KeyGenerate
 * @package App\Console\Commands
 */
class KeyGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'key:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gera uma chave randômica';

    /**
     * @return void
     */
    public function handle()
    {
        echo Str::random(32), PHP_EOL;
    }
}
