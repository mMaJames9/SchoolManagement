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
            'stock_courant' => $materiel->quantite_achat,
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
            'materiel_id' => $materiel->id,
        ]);


    }
}
