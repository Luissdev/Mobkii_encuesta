<?php namespace Mobkii;

use Illuminate\Database\Eloquent\Model;

class Demografico extends Model{


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'demografico';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'nombre', 'status', 'id_encuesta'];

	public function demografico_detalle(){
		return $this->hasMany('Mobkii\DemograficoDetalle');
	}

	public function encuesta(){
		return $this->belongsTo('Mobkii\Encuesta');
	}
}
