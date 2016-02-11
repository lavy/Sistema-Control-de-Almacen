<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetalleOrden
 * @package App
 */
class DetalleOrden extends Model {

	public $timestamps=false;
    protected $primaryKey='id_transaccion';
    protected $table='detalle_planilla_orden';

}
