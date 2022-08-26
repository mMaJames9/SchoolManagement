<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property integer $id
 * @property integer $montant_paiement
 * @property string $created_at
 * @property string $updated_at
 * @property integer $eleve_id
 * @property integer $frais_id
 * @property integer $annee_id
 */
class Paiement extends Model
{
    use HasFactory;
    /**
     * @var array
     */
    protected $fillable = ['montant_paiement', 'created_at', 'updated_at', 'eleve_id', 'frais_id', 'annee_id'];

    public function eleve()
    {
        return $this->belongsTo(Eleve::class, 'eleve_id', 'id');
    }

    public function frais()
    {
        return $this->belongsTo(Frais::class, 'frais_id', 'id');
    }

    public function annee()
    {
        return $this->belongsTo(Annee::class);
    }
}
