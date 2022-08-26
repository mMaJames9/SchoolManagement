<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property string $nom_materiel
 * @property string $date_achat
 * @property integer $quantite_achat
 * @property string $destination
 * @property string $prix_materiel
 * @property string $date_prochain_achat
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class Materiel extends Model
{
    use HasFactory;
    use SoftDeletes;
    /**
     * @var array
     */
    protected $fillable = ['nom_materiel', 'date_achat', 'quantite_achat', 'destination', 'prix_materiel', 'date_prochain_achat', 'created_at', 'updated_at', 'deleted_at'];
}
