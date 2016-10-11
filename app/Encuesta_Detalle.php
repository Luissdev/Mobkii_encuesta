<?php namespace Mobkii;

use Illuminate\Database\Eloquent\Model;

class Encuesta_Detalle extends Model{


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'encuesta_detalle';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'encuesta_id', 'modelo_id', 'valor'];

	public function modelo(){
		return $this->belongsTo('Mobkii\Modelo');
	}

	public function encuesta(){
		return $this->belongsTo('Mobkii\Encuesta');
	}
}
