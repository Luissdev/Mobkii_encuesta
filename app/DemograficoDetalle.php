<?php namespace Mobkii;

use Illuminate\Database\Eloquent\Model;

class DemograficoDetalle extends Model{


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'demografico_detalle';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'nombre', 'id_demografico', 'status'];

	public function demografico(){
		return $this->belongsTo('Mobkii\Demografico');
	}
}
