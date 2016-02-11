<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Solicitudes_Almacen
 * @package App
 */
class Solicitudes_Almacen extends Model {

    public $timestamps=false;
	protected $table='solicitudes_almacen';
    protected $primaryKey='id_solicitud';
}
