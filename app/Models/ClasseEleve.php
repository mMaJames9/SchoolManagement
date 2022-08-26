<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property integer $id
 * @property integer $classe_id
 * @property integer $eleve_id
 */
class ClasseEleve extends Model
{
    use HasFactory;

    /**
     * The table associaited with the model.
     * 
     * @var string
     */
    protected $table = 'classe_eleve';

    /**
     * @var array
     */
    protected $fillable = ['classe_id', 'eleve_id'];

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function eleve()
    {
        return $this->belongsTo(Eleve::class);
    }
}
