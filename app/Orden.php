<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model {

	public $timestamps=false;
    protected $primaryKey='id_orden';
    protected $table='planilla_orden';


}