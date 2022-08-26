<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $type_frais
 * @property integer $montant_frais
 * @property string $date_echeance
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property integer $classe_id
 * @property integer $cycle_id
 * @property integer $annee_id
 */
class Frais extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['type_frais', 'montant_frais', 'date_echeance', 'created_at', 'updated_at', 'deleted_at', 'classe_id', 'cycle_id', 'annee_id'];

    public function annee()
    {
        return $this->belongsTo(Annee::class);
    }

    public function cycle()
    {
        return $this->belongsTo(Cycle::class);
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function paiements()
    {
        return $this->HasMany(Paiement::class, 'frais_id');
    }
}
