<?php

namespace App\AOC\TwentyThree\code;

interface Puzzle
{
    public function getTitle(): string;
    public function solvePartA(): string|null;
    public function solvePartB(): string|null;
    public function getPuzzleInput(): string;
}
