<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property string $nom_pere
 * @property string $num_tel_pere
 * @property string $nom_mere
 * @property string $num_tel_mere
 * @property string $domicile_famille
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class Famille extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = ['nom_pere', 'num_tel_pere', 'nom_mere', 'num_tel_mere', 'domicile_famille', 'created_at', 'updated_at', 'deleted_at'];

    public function eleves()
    {
        return $this->hasMany(Eleve::class);
    }
}
