<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitudes_Almacen extends Model {

    public $timestamps=false;
	protected $table='solicitudes_almacen';
    protected $primaryKey='id_solicitud';
}
