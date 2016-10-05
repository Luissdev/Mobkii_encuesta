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
	protected $fillable = ['id', 'nombre', 'demografico_id', 'encuesta_id', 'status'];

	public function subdemografico_belong_encuesta(){
		return $this->belongsTo('Mobkii\Encuesta');
	}

	public function subdemografico_belong_demografico(){
		return $this->belongsTo('Mobkii\Demografico');
	}

}
