<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property string $libelle_cycle
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class Cycle extends Model
{
    use HasFactory;
    use SoftDeletes;
    /**
     * @var array
     */
    protected $fillable = ['libelle_cycle', 'created_at', 'updated_at', 'deleted_at'];
}
