<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property string $intitule_matiere
 * @property integer $niveau_matiere
 * @property integer $coef_matiere
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class Matiere extends Model
{
    use HasFactory;
    use SoftDeletes;
    /**
     * @var array
     */
    protected $fillable = ['intitule_matiere', 'niveau_matiere', 'coef_matiere', 'created_at', 'updated_at', 'deleted_at'];

    public function eleves()
    {
        return $this->belongsToMany(Eleve::class, EleveMatiere::class);
    }
}
