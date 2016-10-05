<?php namespace Mobkii;

use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model{


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'encuesta';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'nombre', 'modelo_id', 'status'];

	public function encuesta_belong_modelo(){
		return $this->belongsTo('Mobkii\Modelo');
	}

	public function encuesta_has_subdemografico(){
		return $this->hasMany('Mobkii\DemograficoDetalle');
	}
}
