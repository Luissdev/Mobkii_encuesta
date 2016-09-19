<?php

namespace Mobkii;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'productos';
    protected $perPage = 12;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'nombre', 'precio', 'imagen', 'descripcion', 'status', 'id_categoria', 'id_negocio'];

    public function categoria(){
        return $this->belongsTo('Mobkii\Categoria');
    }

    public function negocio(){
        return $this->belongsTo('Mobkii\Negocio');
    }

    public function pedido(){
        return $this->belongsToMany('Mobkii\Pedido');
    }
    
}
