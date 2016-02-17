<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Solicitudes
 * @package App
 */
class Solicitudes extends Model {

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
    protected $primaryKey='id_solicitud';

    /**
     * La tabla de base de datos usada por el modelo
     *
     * @var string
     */
	protected $table='solicitudes';
/*    protected $fillable=[''];
    protected $guarded=['id_solicitud'];*/
}
