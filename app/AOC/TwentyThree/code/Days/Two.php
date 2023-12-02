<?php

namespace App\AOC\TwentyThree\code\Days;

use App\AOC\TwentyThree\code\Puzzle;
use Illuminate\Support\Facades\File;

class Two implements Puzzle
{
    const COLOR_RULES = ['red' => 12, 'green' => 13, 'blue' => 14];

    public function solvePartA(): string|null
    {
        $input = explode("\n", $this->getPuzzleInput());
        $sum = 0;

        foreach ($input as $row) {
            $gameString = explode(":", $row);

            $gameId = preg_replace("/[^0-9]/", "", $gameString[0]);
            $sets = explode(";", $gameString[1]);

            $legalGame = true;

            foreach($sets as $set) {
                $colors = explode(",", $set);

                foreach($colors as $color) {
                    foreach (self::COLOR_RULES as $colorRuleName => $colorRuleAmount) {
                        if (str_contains($color, $colorRuleName)) {
                            $colorAmount = preg_replace("/[^0-9]/", "", $color);
                            if ($colorAmount > $colorRuleAmount) {
                                $legalGame = false;
                            }
                        }
                    }
                }
            }

            if ($legalGame) {
                $sum += $gameId;
            }
        }

        return $sum;
    }

    public function solvePartB(): string|null
    {
        $input = explode("\n", $this->getPuzzleInput());

        $sumAll = 0;

        foreach ($input as $row) {
            $sum = 1;
            $lowest = [];
            $gameString = explode(":", $row);

            $sets = explode(";", $gameString[1]);

            foreach($sets as $set) {
                $colors = explode(",", $set);

                foreach($colors as $color) {
                    foreach (self::COLOR_RULES as $colorRuleName => $colorRuleAmount) {
                        if (str_contains($color, $colorRuleName)) {
                            $colorAmount = preg_replace("/[^0-9]/", "", $color);
                            if ((!array_key_exists($colorRuleName, $lowest)) || ($lowest[$colorRuleName] < $colorAmount)) {
                                $lowest[$colorRuleName] = $colorAmount;
                            }
                        }
                    }
                }
            }

            foreach ($lowest as $value) {
                $sum *= $value;
            }

            $sumAll += $sum;
        }

        return $sumAll;
    }

    public function getPuzzleInput(): string
    {
        return trim(File::get(storage_path('../app/AOC/TwentyThree/input/Two.input')));
    }

    public function getTitle(): string
    {
        return 'Day 1: Trebuchet calibration';
    }
}
