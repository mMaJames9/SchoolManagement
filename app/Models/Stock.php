<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property integer $stock_courant
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property integer $materiel_id
 */
class Stock extends Model
{
    use HasFactory;
    use SoftDeletes;
    /**
     * @var array
     */
    protected $fillable = ['stock_courant', 'created_at', 'updated_at', 'deleted_at', 'materiel_id'];

    public function materiel()
    {
        return $this->belongsTo(Materiel::class, 'materiel_id');

    }
}
