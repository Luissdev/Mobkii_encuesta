<?php namespace Mobkii;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model{


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'modelo';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'nombre', 'status'];

	public function modelo_has_encuesta(){
		return $this->hasMany('Mobkii\Encuesta');
	}

	public function modelo_has_dimension(){
		return $this->hasMany('Mobkii\Dimension');
	}

	public function encuesta_detalle(){
		return $this->hasMany('Mobkii\Encuesta_Detalle');
	}

	public function modelo_detalle(){
		return $this->hasMany('Mobkii\Modelo_detalle');
	}
}
