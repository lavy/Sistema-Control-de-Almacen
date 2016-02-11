<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Solicitudes
 * @package App
 */
class Solicitudes extends Model {

    public $timestamps=false;
    protected $primaryKey='id_solicitud';
	protected $table='solicitudes';
    protected $fillable=[''];
    protected $guarded=['id_solicitud'];
}
