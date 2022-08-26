<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $stock
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property integer $materiel_id
 * @property integer $user_id
 */
class Transaction extends Model
{
    use \Znck\Eloquent\Traits\BelongsToThrough;

    /**
     * @var array
     */
    protected $fillable = ['stock', 'created_at', 'updated_at', 'deleted_at', 'materiel_id', 'user_id'];

    public function materiel()
    {
        return $this->belongsTo(Materiel::class, 'materiel_id');

    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');

    }

    public function personnel()
    {
        return $this->belongsToThrough(Personnel::class, User::class);

    }
}
