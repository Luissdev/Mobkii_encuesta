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
	protected $fillable = ['id', 'nombre', 'status'];

	public function demografico_has_subdemografico(){
		return $this->hasMany('Mobkii\DemograficoDetalle');
	}
}
