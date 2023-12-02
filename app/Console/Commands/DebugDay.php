<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DebugDay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'debug:day';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $day = new \App\AOC\TwentyThree\code\Days\Two();

        // write result of part one to console
        //$this->info('Part one: ' . $day->solvePartA());
        //$this->info('Part two: ' . $day->solvePartB());
        $this->info('Day 2 - Part 1: ' . $day->solvePartA());
        $this->info('Day 2 - Part 2: ' . $day->solvePartB());
    }
}
