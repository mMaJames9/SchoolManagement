<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $intitule_competence
 * @property string $created_at
 * @property string $updated_at
 */
class Competence extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['intitule_competence', 'created_at', 'updated_at'];

    public function matieres()
    {
        return $this->HasMany(Matiere::class);
    }
}
