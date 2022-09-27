<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property string $nom_personnel
 * @property string $prenom_personnel
 * @property string $birthday_personnel
 * @property string $phone_number
 * @property integer $experience_personnel
 * @property string $cv_personnel
 * @property string $photo_profil_personnel
 * @property string $debut_contrat
 * @property string $fin_contrat
 * @property integer $salaire
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class Personnel extends Model
{
    use HasFactory;
    use SoftDeletes;
    /**
     * @var array
     */

    protected $fillable = ['nom_personnel', 'prenom_personnel', 'birthday_personnel', 'phone_number', 'experience_personnel', 'cv_personnel', 'photo_profil_personnel', 'debut_contrat', 'fin_contrat', 'salaire', 'created_at', 'updated_at', 'deleted_at'];

    public function salaires()
    {
        return $this->hasMany(Salaire::class);
    }

    public function salaireMensuel()
    {
        return $this->salaires()->whereRaw("CAST(SUBSTR(date_paiement_salaire, 6, 2) AS integer) = '".date('n')."'");
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}

