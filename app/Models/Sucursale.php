<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Sucursale
 *
 * @property $id
 * @property $nombre
 * @property $Direccion
 * @property $ciudad
 * @property $telefono
 * @property $created_at
 * @property $updated_at
 *
 * @property Colaboradore[] $colaboradores
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Sucursale extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'Direccion' => 'required',
		'ciudad' => 'required',
		'telefono' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','Direccion','ciudad','telefono'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function colaboradores()
    {
        return $this->hasMany('App\Models\Colaboradore', 'sucursal_id', 'id');
    }
    

}
