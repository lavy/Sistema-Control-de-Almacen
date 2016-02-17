<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Proveedor
 * @package App
 */
class Proveedor extends Model {

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
    protected $primaryKey='id_proveedor';

    /**
     * La tabla de base de datos usada por el modelo
     *
     * @var string
     */
    protected $table='proveedores';

    /*protected $fillable=[''];
    protected $guarded='id_proveedor';*/


}
