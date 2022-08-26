<?php

namespace App\View\Components;

use App\Models\Annee;
use Carbon\Carbon;
use Illuminate\View\Component;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        if(Carbon::now()->month >= 8 && Carbon::now()->month <= 12)
        {
            $current_year = Annee::where('year_from', Carbon::now()->year)->get();
            $anne_academique = $current_year->value('annee_academique');
        }
        else
        {
            $previous_year = Carbon::now()->subYear(1)->year;

            $current_year = Annee::where('year_from', $previous_year)->get();
            $anne_academique = $current_year->value('annee_academique');
        }

        return view('layouts.app')->with('anne_academique', $anne_academique);
    }
}
