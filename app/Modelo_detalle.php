<?php namespace Mobkii;

use Illuminate\Database\Eloquent\Model;

class Modelo_Detalle extends Model{


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'modelo_detalle';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'modelo_id', 'dimension_id', 'pregunta', 'sg', 'ic'];

	public function modelo(){
		return $this->belongsTo('Mobkii\Modelo');
	}

	public function encuesta(){
		return $this->belongsTo('Mobkii\Dimension');
	}
}
