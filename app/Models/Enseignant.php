<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

/**
 * @property int $id
 * @property string $matricule_enseignant
 * @property string $nom_enseignant
 * @property string $prenom_enseignant
 * @property string $birthday_enseignant
 * @property string $num_tel_enseignant
 * @property string $experience_enseignant
 * @property string $cv_enseignant
 * @property string $photo_profil_enseignant
 * @property string $debut_contrat
 * @property string $fin_contrat
 * @property integer $salaire
 */
class Enseignant extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = ['matricule_enseignant', 'nom_enseignant', 'prenom_enseignant', 'birthday_enseignant', 'experience_enseignant', 'num_tel_enseignant', 'cv_enseignant', 'photo_profil_enseignant', 'debut_contrat', 'fin_contrat', 'salaire'];

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function salaires()
    {
        return $this->hasMany(Salaire::class);
    }

    public function salaireMensuel()
    {
        return $this->salaires()->whereRaw("CAST(SUBSTR(date_paiement_salaire, 6, 2) AS integer) = '".date('n')."'");
    }
}
