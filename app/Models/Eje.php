<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Eje
 *
 * @property $id
 * @property $manual_id
 * @property $nombre
 * @property $descripcion
 * @property $created_at
 * @property $updated_at
 *
 * @property Manuale $manuale
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Eje extends Model
{
    
    static $rules = [
		'manual_id' => 'required',
		'nombre' => 'required',
		'descripcion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['manual_id','nombre','descripcion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function manuale()
    {
        return $this->hasOne('App\Models\Manuale', 'id', 'manual_id');
    }
    

}
