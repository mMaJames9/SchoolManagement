<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property string $nom_etablissement
 * @property string $bulletin_precedent
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property integer $eleve_id
 */
class Parcours extends Model
{
    use HasFactory;
    use SoftDeletes;
    /**
     * @var array
     */
    protected $fillable = ['nom_etablissement', 'bulletin_precedent', 'created_at', 'updated_at', 'deleted_at', 'eleve_id'];

    public function eleve()
    {
        return $this->belongsTo(Eleve::class);
    }
}
