<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Manuale
 *
 * @property $id
 * @property $nombre
 * @property $copyright
 * @property $created_at
 * @property $updated_at
 *
 * @property Eje[] $ejes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Manuale extends Model
{

    static $rules = [
		'nombre' => 'required|string|max:100',
		'copyright' => 'required|string|max:100',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','copyright'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ejes()
    {
        return $this->hasMany('App\Models\Eje', 'manual_id', 'id');
    }


}
