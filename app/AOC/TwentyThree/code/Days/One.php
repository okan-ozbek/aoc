<?php

namespace App\AOC\TwentyThree\code\Days;

use App\AOC\TwentyThree\code\Puzzle;
use Illuminate\Support\Facades\File;

class One implements Puzzle
{
    public function solvePartA(): string|null
    {
        $input = explode("\n", $this->getPuzzleInput());
        $sum = 0;

        foreach ($input as $row) {
            $foundNumbers = [];
            $foundNumbersReverse = [];

            for ($i = 0; $i <= 9; ++$i) {
                $position = strpos($row, (string)$i);
                $reverse = strrpos($row, (string)$i);

                if ($position !== false) {
                    $foundNumbers [$position]= $row[$position];
                }

                if ($reverse !== false) {
                    $foundNumbersReverse [$reverse]= $row[$reverse];
                }
            }
            ksort($foundNumbers);
            krsort($foundNumbersReverse);
            $sortedArray = array_values($foundNumbers);
            $sortedArrayReverse = array_values($foundNumbersReverse);

            $rowFinalValue = $sortedArray[0] . $sortedArrayReverse[0];
            $sum += $rowFinalValue;
        }

        return $sum;
    }

    public function solvePartB(): string|null
    {
        $input = explode("\n", $this->getPuzzleInput());
        $sum = 0;
        $textNumbers = ['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];
        $validNumbers = ['o1e', 't2o', 't3e', 'f4r', 'f5e', 's6x', 's7n', 'e8t', 'n9e'];

        foreach ($input as $row) {
            $replaced = str_replace($textNumbers, $validNumbers, $row);

            $foundNumbers = [];
            $foundNumbersReverse = [];

            for ($i = 0; $i <= 9; ++$i) {
                $position = strpos($replaced, (string)$i);
                $reverse = strrpos($replaced, (string)$i);

                if ($position !== false) {
                    $foundNumbers [$position]= $replaced[$position];
                }

                if ($reverse !== false) {
                    $foundNumbersReverse [$reverse]= $replaced[$reverse];
                }
            }
            ksort($foundNumbers);
            krsort($foundNumbersReverse);
            $sortedArray = array_values($foundNumbers);
            $sortedArrayReverse = array_values($foundNumbersReverse);

            $rowFinalValue = $sortedArray[0] . $sortedArrayReverse[0];
            $sum += $rowFinalValue;
        }

        return $sum;
    }

    public function getPuzzleInput(): string
    {
        return trim(File::get(storage_path('../app/AOC/TwentyThree/input/One.input')));
    }

    public function getTitle(): string
    {
        return 'Day 1: Trebuchet calibration';
    }
}
