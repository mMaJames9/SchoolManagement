<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property string $matricule_eleve
 * @property string $nom_eleve
 * @property string $prenom_eleve
 * @property integer $age_eleve
 * @property integer $sexe_eleve
 * @property string $photo_profil_eleve
 * @property string $maladie_hereditaire
 * @property string $acte_naissance
 * @property string $fiche_renseignement
 * @property string $carnet_vaccination
 * @property string $date_debut
 * @property string $date_fin
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property integer $famille_id
 * @property integer $classe_id
 * @property integer $parcours_id
 */
class Eleve extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = ['matricule_eleve', 'nom_eleve', 'prenom_eleve', 'age_eleve', 'sexe_eleve', 'photo_profil_eleve', 'maladie_hereditaire', 'acte_naissance', 'fiche_renseignement', 'carnet_vaccination', 'date_debut', 'date_fin', 'created_at', 'updated_at', 'deleted_at', 'famille_id', 'classe_id', 'parcours_id'];

    public function famille()
    {
        return $this->belongsTo(Famille::class);
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function parcours()
    {
        return $this->belongsTo(Parcours::class, 'parcours_id', 'id');
    }
}
