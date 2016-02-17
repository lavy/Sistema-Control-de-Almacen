<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Almacen
 * @package App
 */
class Almacen extends Model {

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
    protected $primaryKey='id_almacen';

    /**
     * La tabla de base de datos usada por el modelo
     *
     * @var string
     */
    protected $table='almacen';

}
