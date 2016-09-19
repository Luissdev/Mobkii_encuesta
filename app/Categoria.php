<?php

namespace Mobkii;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categorias';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'nombre', 'descripcion', 'status'];

    public function productos(){
        return $this->hasMany('Mobkii\Producto');
    }
}
