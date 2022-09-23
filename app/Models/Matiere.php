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
 * @property integer $competence_id
 */
class Matiere extends Model
{
    use HasFactory;
    use SoftDeletes;
    /**
     * @var array
     */
    protected $fillable = ['intitule_matiere', 'niveau_matiere', 'coef_matiere', 'created_at', 'updated_at', 'deleted_at', 'competence_id'];

    public function competence()
    {
        return $this->belongsTo(Competence::class);
    }

    public function notes()
    {
        return $this->HasMany(Note::class, 'matiere_id');
    }

}
