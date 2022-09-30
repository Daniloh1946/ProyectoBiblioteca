<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Colaboradore
 *
 * @property $id
 * @property $nombre
 * @property $apellidos
 * @property $cedula
 * @property $telefono
 * @property $sucursal_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Sucursale $sucursale
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Colaboradore extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'apellidos' => 'required',
		'cedula' => 'required',
		'telefono' => 'required',
		'sucursal_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','apellidos','cedula','telefono','sucursal_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sucursale()
    {
        return $this->hasOne('App\Models\Sucursale', 'id', 'sucursal_id');
    }
    

}
