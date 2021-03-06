<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Oficinas
 * @package App
 */
class Oficinas extends Model {

    /**
     * El Timestamp de la tabla
     * valores: 'true','false'.
     *
     * @var bool
     */
    public $timestamps=false;

    /**
     * La llave primaria de la tabla.
     *
     * @var string
     */
    protected $primaryKey = 'id_oficina';

    /**
     * La tabla de base de datos usada por el modelo
     *
     * @var string
     */
    protected $table='oficinas';


    /**
     * Relacionamiento de la Tabla Oficina con la Tabla Departamentos
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function departamentos()
    {
        //Tabla a referenciar Clave foranea del y clave local
        return $this->hasMany('App\Departamentos','id_oficina','id_oficina');
    }

    public function jefes()
    {
        return $this->hasOne(Jefes::class,'id_oficina','id_oficina');
    }


    /*public function scopeOficina($query,$tipo,$buscar)
    {
       return $query->where($tipo,$buscar);
    }*/

}
