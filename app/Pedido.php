<?php

namespace Mobkii;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pedidos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'cantidad_producto', 'subtotal', 'iva', 'id_usuario', 'id_producto', 'status'];

    public function usuario(){
        return $this->belongsTo('Mobkii\Usuario');
    }

    public function producto(){
        return $this->belongsTo('Mobkii\Producto');
    }
}
