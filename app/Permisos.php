<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Permisos extends Model {

    public $timestamps=false;
	protected $table='opciones_perfiles';
    protected $primaryKey='id_opcion';

}
