<?php

function calculGrade(float $x)
{
    if ($x >= 0 && $x < 7)
    {
        $grade = 'F';
    }
    elseif ($x >= 7 && $x < 10)
    {
        $grade = 'D';
    }
    elseif ($x >= 10 && $x < 12)
    {
        $grade = 'C-';
    }
    elseif ($x >= 12 && $x < 13)
    {
        $grade = 'C';
    }
    elseif ($x >= 13 && $x < 14)
    {
        $grade = 'C+';
    }
    elseif ($x >= 14 && $x < 16)
    {
        $grade = 'B-';
    }
    elseif ($x >= 16 && $x < 17)
    {
        $grade = 'B';
    }
    elseif ($x >= 17 && $x < 18)
    {
        $grade = 'B+';
    }
    elseif ($x >= 18 && $x < 19)
    {
        $grade = 'A-';
    }
    elseif ($x >= 19 && $x < 20)
    {
        $grade = 'A';
    }
    else
    {
        $grade = 'A+';
    }

    return $grade;
}


