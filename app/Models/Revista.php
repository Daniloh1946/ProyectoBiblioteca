<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Revista
 *
 * @property $id
 * @property $titulo
 * @property $tipo_id
 * @property $fecha
 * @property $num_paginas
 * @property $num_ejemplares
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Revista extends Model
{
    
    static $rules = [
		'titulo' => 'required',
		'tipo_id' => 'required',
		'fecha' => 'required',
		'num_paginas' => 'required',
		'num_ejemplares' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['titulo','tipo_id','fecha','num_paginas','num_ejemplares'];



}
