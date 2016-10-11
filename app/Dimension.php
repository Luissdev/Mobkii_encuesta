<?php namespace Mobkii;

use Illuminate\Database\Eloquent\Model;

class Dimension extends Model{


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'dimension';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'modelo_id', 'padre_id', 'dimension', 'status'];

	public function modelo_detalle(){
		return $this->hasMany('Mobkii\Modelo_Detalle');
	}
	
	public function modelo(){
		return $this->belongsTo('Mobkii\Modelo');
	}
}
