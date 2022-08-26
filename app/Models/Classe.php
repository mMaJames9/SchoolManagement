<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property string $nom_section
 * @property string $nom_classe
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property integer $cycle_id
 * @property integer $enseignant_id
 */
class Classe extends Model
{
    use HasFactory;
    use SoftDeletes;
    /**
     * @var array
     */
    protected $fillable = ['nom_section', 'nom_classe', 'created_at', 'updated_at', 'deleted_at', 'cycle_id', 'enseignant_id'];

    public function eleves()
    {
        return $this->hasMany(Eleve::class);
        return $this->belongsToMany(Eleve::class, ClasseEleve::class);
    }

    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class);
    }

    public function cycle()
    {
        return $this->belongsTo(Cycle::class);
    }
}
