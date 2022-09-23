<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $note_eleve
 * @property string $mois_bulletin
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property integer $eleve_id
 * @property integer $matiere_id
 * @property integer $annee_id
 */
class Note extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['note_eleve', 'mois_bulletin', 'created_at', 'updated_at', 'deleted_at', 'eleve_id', 'matiere_id', 'annee_id'];

    public function eleve()
    {
        return $this->belongsTo(Eleve::class);
    }

    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }

    public function annee()
    {
        return $this->belongsTo(Annee::class);
    }
}
