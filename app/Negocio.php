<?php namespace Mobkii;

use Illuminate\Database\Eloquent\Model;

class Negocio extends Model{


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'negocio';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'nombre', 'email', 'password', 'descripcion', 'status'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

		return $this->hasMany('Mobkii\Usuario');
	}
	public function productos(){
		return $this->hasMany('Mobkii\Producto');
	}

}
