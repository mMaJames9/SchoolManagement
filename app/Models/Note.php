<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $note_eleve
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property integer $eleve_id
 */
class Note extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['note_eleve', 'created_at', 'updated_at', 'deleted_at', 'eleve_id'];
}
