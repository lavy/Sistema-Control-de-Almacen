<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleOrden extends Model {

	public $timestamps=false;
    protected $primaryKey='id_transaccion';
    protected $table='detalle_planilla_orden';

}
