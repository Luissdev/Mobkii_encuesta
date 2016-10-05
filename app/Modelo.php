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

	public function encuestas(){
		return $this->hasMany('Mobkii\Encuesta');
	}

	
}
