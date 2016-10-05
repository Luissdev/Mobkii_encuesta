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
	protected $fillable = ['id', 'nombre', 'id_modelo', 'status'];

	public function modelo(){
		return $this->belongsTo('Mobkii\Modelo');
	}

	public function demografico(){
		return $this->hasMany('Mobkii\Demografico');
	}
}
