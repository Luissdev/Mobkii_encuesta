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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'nombre', 'precio', 'imagen', 'descripcion', 'id_cliente', 'id_categoria', 'status'];

    public function categoria(){
        return $this->belongsTo('Mobkii\Categoria');
    }

    public function  cliente(){
        return $this->belongsTo('Mobkii\Cliente');
    }

    public function pedidos(){
        return $this->hasMany('Mobkii\Pedido');
    }
    
}
