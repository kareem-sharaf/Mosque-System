<?php

namespace App\Services;

class PointCalculator
{
    public function calculatePoints(array $actionData): int
    {
        $points = 0;


        if ($actionData['exist']) {
            $points += 5;
        }

        $points += $actionData['pages'] * 10;
        $points += $actionData['hadiths'] * 5;
        $points += $actionData['clothes'] ? 10 : 0;
        $points -= $actionData['noisy'] ? 10 : 0;

        return $points;
    }
}
