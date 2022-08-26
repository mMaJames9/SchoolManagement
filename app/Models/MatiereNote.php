<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $note_id
 * @property integer $matiere_id
 */
class MatiereNote extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'matiere_note';

    /**
     * @var array
     */
    protected $fillable = ['note_id', 'matiere_id'];
}
