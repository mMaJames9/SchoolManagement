<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $year_from
 * @property string $year_to
 * @property string $annee_academique
 * @property string $created_at
 * @property string $updated_at
 */
class Annee extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['year_from', 'year_to', 'annee_academique', 'created_at', 'updated_at'];
}
