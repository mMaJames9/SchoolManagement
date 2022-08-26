<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property integer $montant_salaire
 * @property string $date_paiement_salaire
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property integer $enseignant_id
 * @property integer $personnel_id
 */
class Salaire extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = ['montant_salaire', 'date_paiement_salaire', 'created_at', 'updated_at', 'deleted_at', 'enseignant_id', 'personnel_id'];

    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class);
    }

    public function personnel()
    {
        return $this->belongsTo(Personnel::class);
    }
}
