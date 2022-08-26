<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $nom_sequence
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property integer $eleve_id
 * @property integer $annee_id
 */
class Bulletin extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['nom_sequence', 'created_at', 'updated_at', 'deleted_at', 'eleve_id', 'annee_id'];

    public function annee()
    {
        return $this->belongsTo(Annee::class);
    }

    public function eleve()
    {
        return $this->belongsTo(Eleve::class);
    }
}
