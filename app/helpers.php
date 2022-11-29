<?php

use App\Models\Annee;
use Carbon\Carbon;

function calculGrade(float $x)
{
    if ($x >= 0 && $x < 11)
    {
        $grade = 'C';
    }
    elseif ($x >= 11 && $x < 15)
    {
        $grade = 'B';
    }
    elseif ($x >= 15 && $x < 18)
    {
        $grade = 'A';
    }
    else
    {
        $grade = 'A+';
    }

    return $grade;
}

function calculScore (float $a, int $x)
{
    $b = ($a * 20) / $x;
    return $b;
}

function getEvaluation(int $date)
{
    if ($date == 10)
    {
        $evaluation = 1;
    }
    else if ($date == 11)
    {
        $evaluation = 2;
    }
    else if ($date == 12)
    {
        $evaluation = 3;
    }
    else if ($date == 1)
    {
        $evaluation = 4;
    }
    else if ($date == 2)
    {
        $evaluation = 5;
    }
    else if ($date == 3)
    {
        $evaluation = 6;
    }
    else if ($date == 4)
    {
        $evaluation = 7;
    }
    else if ($date == 5)
    {
        $evaluation = 8;
    }
    else if ($date == 6)
    {
        $evaluation = 9;
    }
    else
    {
        $evaluation = null;
    }

    return $evaluation;
}

function anneeId()
{
    if(Carbon::now()->month >= 8 && Carbon::now()->month <= 12)
    {
        $annee_id = Annee::where('year_from', Carbon::now()->year)->value('id');
    }
    else
    {
        $previous_year = Carbon::now()->subYear(1)->year;

        $annee_id = Annee::where('year_from', $previous_year)->value('id');
    }

    return $annee_id;
}
