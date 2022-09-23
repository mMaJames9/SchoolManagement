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
 * @property string $birthday_eleve
 * @property string $lieu_naissance
 * @property integer $sexe_eleve
 * @property string $acte_naissance
 * @property string $carnet_vaccination
 * @property string $photo_profil_eleve
 * @property string $maladie_hereditaire
 * @property string $maladie_chronique
 * @property string $alergie_aliment
 * @property string $alergie_medicament
 * @property string $alergie_substance
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property integer $famille_id
 * @property integer $classe_id
 * @property integer $annee_id
 */
class Eleve extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = [
        'matricule_eleve',
        'nom_eleve',
        'prenom_eleve',
        'birthday_eleve',
        'lieu_naissance',
        'sexe_eleve',
        'acte_naissance',
        'carnet_vaccination',
        'photo_profil_eleve',
        'maladie_hereditaire',
        'maladie_chronique',
        'alergie_aliment',
        'alergie_medicament',
        'alergie_substance',
        'created_at',
        'updated_at',
        'deleted_at',
        'famille_id',
        'classe_id',
        'annee_id',
    ];

    public function famille()
    {
        return $this->belongsTo(Famille::class);
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function annee()
    {
        return $this->belongsTo(Annee::class);
    }

    public function parcours()
    {
        return $this->hasOne(Parcours::class);
    }

    public function classes()
    {
        return $this->belongsToMany(Classe::class, ClasseEleve::class);
    }

    public function paiements()
    {
        return $this->HasMany(Paiement::class, 'eleve_id');
    }

    public function notes()
    {
        return $this->HasMany(Note::class, 'eleve_id');
    }

    public function notesMensuel()
    {
        return $this->notes()->whereRaw("CAST(SUBSTR(mois_bulletin, 6, 2) AS integer) = '".date('n')."'");
    }


}
