<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Oficinas
 * @package App
 */
class Oficinas extends Model {

    public $timestamps=false;
    protected $primaryKey = 'id_oficina';
    protected $table='oficinas';
	protected $fillable=['descrip_oficina'];
    protected $guarded=['id_oficina'];

    public function departamentos()
    {
        //Tabla a referenciar Clave foranea del y clave local
        return $this->hasMany('App\Departamentos','id_oficina','id_oficina');
    }


    /*public function scopeOficina($query,$tipo,$buscar)
    {
       return $query->where($tipo,$buscar);
    }*/

}
