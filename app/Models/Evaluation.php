<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $num_evaluation
 * @property string $created_at
 * @property string $updated_at
 * @property integer $trimestre_id
 */
class Evaluation extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['num_evaluation', 'created_at', 'updated_at', 'trimestre_id'];

    public function trimestre()
    {
        return $this->belongsTo(Trimestre::class);
    }
}
