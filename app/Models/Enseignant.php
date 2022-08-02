<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $matricule_enseignant
 * @property string $nom_enseignant
 * @property string $prenom_enseignant
 * @property int $age_enseignant
 * @property string $experience_enseignant
 * @property string $photo_profil_enseignant
 */
class Enseignant extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = ['matricule_enseignant', 'nom_enseignant', 'prenom_enseignant', 'age_enseignant', 'experience_enseignant', 'photo_profil_enseignant'];

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }
}
