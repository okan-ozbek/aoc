<?php

namespace App\AOC\TwentyThree\code\Days;

use App\AOC\TwentyThree\code\Puzzle;
use Illuminate\Support\Facades\File;

class Four implements Puzzle
{
    public function solvePartA(): string|null
    {
        $inputs = explode("\n", $this->getPuzzleInput());

        $sum = null;

        foreach ($inputs as $input) {
            $confirmedWon = [];

            $games = explode(":", $input);
            $numbers = explode("|", $games[1]);

            preg_match_all('/\d+/', $numbers[0], $winningNumbers);
            preg_match_all('/\d+/', $numbers[1], $myNumbers);

            foreach($myNumbers[0] as $number) {
                if (in_array($number, $winningNumbers[0])) {
                    $confirmedWon []= $number;
                }
            }

            $points = 0;
            if (count($confirmedWon) >= 1) {
                $first = true;
                foreach ($confirmedWon as $value) {
                    if ($first) {
                        $points += 1;
                        $first = false;
                        continue;
                    }
                    $points *= 2;
                }
            }

            $sum += $points;
        }

        dd($sum);

        return null;
    }

    public function solvePartB(): string|null
    {
        return null;
    }

    public function getPuzzleInput(): string
    {
        return trim(File::get(storage_path('../app/AOC/TwentyThree/input/Four.input')));
    }

    public function getTitle(): string
    {
        return 'Day 1: Trebuchet calibration';
    }
}
