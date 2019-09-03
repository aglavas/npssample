<?php

namespace App\Services;

class PercentCalculator
{
    /**
     * Calculate percent
     *
     * @param int $promoterCount
     * @param int $passiveCount
     * @param int $detractorCount
     * @param string $asked
     * @return float
     */
    public static function calculatePercent(int $promoterCount, int $passiveCount, int $detractorCount, string $asked)
    {
        $total = $promoterCount + $passiveCount + $detractorCount;

        if ($total === 0) {
            return round(0, 2);
        }

        $percent = ($asked / $total) * 100;

        return round($percent, 2);
    }
}
