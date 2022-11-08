<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $num_trimestre
 * @property string $created_at
 * @property string $updated_at
 */
class Trimestre extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['num_trimestre', 'created_at', 'updated_at'];

    public function evaluations()
    {
        return $this->HasMany(Evaluation::class, 'trimestre_id');
    }
}
