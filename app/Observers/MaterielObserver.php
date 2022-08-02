<?php

namespace App\Observers;

use App\Models\Materiel;
use App\Models\Stock;

class MaterielObserver
{

    /**
     * Handle the asset "created" event.
     *
     * @param Asset $asset
     * @return void
     */
    public function created(Materiel $materiel)
    {
        Stock::create([
            'stock_courant' => 0,
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
            'materiel_id' => $materiel->id,
        ]);


    }
}
